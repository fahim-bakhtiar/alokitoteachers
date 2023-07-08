<?php

namespace App\Http\Controllers\web\website;

use Carbon\Carbon;
use App\Models\Payment;
use App\Models\CourseVideo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Bus\TeacherCourseBus;
use App\Services\CourseService;
use App\Services\TeacherService;
use App\Services\ProgressService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CoursesPageController extends Controller
{
    protected $course_service;
    protected $teacherCourse_bus;
    protected $progress_service;
    protected $teacher_service;

    public function __construct(CourseService $course_service, ProgressService $progress_service,TeacherCourseBus $teacherCourse_bus, TeacherService $teacher_service){

        $this->course_service = $course_service;
        $this->teacher_service = $teacher_service;
        $this->teacherCourse_bus = $teacherCourse_bus;
        $this->progress_service = $progress_service;

    }

    public function deliver_courses(){

        $courses = $this->course_service->active_courses();

        $logged_in_teacher = get_current_teacher() ? get_current_teacher() : null; 

        return view('website.courses.index', compact('courses', 'logged_in_teacher'));

    }

    public function deliver_single($course_id){
        
        $course = $this->course_service->find($course_id);
        
        $logged_in_teacher = get_current_teacher() ? get_current_teacher() : get_empty_teacher();

        $progress = $this->progress_service->get_progress($course_id, $logged_in_teacher->id);

        return view('website.courses.single', compact('course', 'logged_in_teacher', 'progress'));

    }

    public function unlock_course(Request $request, $courseID, $teacherID){

        $unlock_result = $this->teacherCourse_bus->unlock_course_for_teacher($courseID, $teacherID);

        return redirect()->route('website.courses.single', $courseID);

    }


    public function load_course_content($courseID, $desired_sequence){

        $course = $this->course_service->find($courseID);

        $logged_in_teacher = get_current_teacher() ? get_current_teacher() : get_empty_teacher();

        $progress = $this->progress_service->get_progress($courseID, $logged_in_teacher->id);
        
        if(!$progress){

            return redirect()->back();

        }


        $course_sequence = $this->course_service->sequence_list($courseID);


        if(($progress->get_current_sequence() == $progress->get_next_sequence()) && ($desired_sequence == count($course_sequence))){
                
            return view('website.courses.content_course_finished', compact('course', 'logged_in_teacher', 'progress', 'course_sequence', 'desired_sequence'));

        }

        if(($progress->get_current_sequence() < $progress->get_next_sequence()) && ($desired_sequence > count($course_sequence))){
                
            abort(404);

        }

        if($desired_sequence == $progress->get_next_sequence()){

            if($course_sequence[$desired_sequence] instanceof CourseVideo){
                // dd(count($course_sequence));
                return view('website.courses.content_video', compact('course', 'logged_in_teacher', 'progress', 'course_sequence', 'desired_sequence'));
    
            }else{
                
                return view('website.courses.content_quiz', compact('course', 'logged_in_teacher', 'progress', 'course_sequence', 'desired_sequence'));
    
            }

        }
        
        if($desired_sequence < $progress->get_next_sequence()){

            if($course_sequence[$desired_sequence] instanceof CourseVideo){

                return view('website.courses.content_video', compact('course', 'logged_in_teacher', 'progress', 'course_sequence', 'desired_sequence'));
    
            }else{
    
                return view('website.courses.content_quiz_disclaimer', compact('course', 'logged_in_teacher', 'progress', 'course_sequence', 'desired_sequence'));
    
            }

        }

        if($desired_sequence > $progress->get_next_sequence()){

            return redirect()->back();

        }

    }


    public function course_video_just_been_watched(Request $request){

        $course = $this->course_service->find($request->courseID);

        $logged_in_teacher = get_current_teacher() ? get_current_teacher() : get_empty_teacher();

        $progress = $this->progress_service->get_progress($course->id, $logged_in_teacher->id);

        $course_sequence = $this->course_service->sequence_list($course->id);


        if($request->sequence_which_just_been_watched < $progress->get_next_sequence()){
            
            return redirect()->route('course.teacher.load_course_content', ['courseID' => $course->id, 'desired_sequence' => ( (int)$request->sequence_which_just_been_watched + 1)]);

        }
        
        if($request->sequence_which_just_been_watched >= $progress->get_current_sequence()){
            
            $current_overall_progress_status = $progress->get_current_overall_status();
        
            $current_overall_progress_status->progress = (int) round(($request->sequence_which_just_been_watched / $course->no_of_chapters()) * 100);

            $current_overall_progress_status->current_sequence = ((int) $request->sequence_which_just_been_watched);

            if(count($course_sequence) > $request->sequence_which_just_been_watched){

                $current_overall_progress_status->next_sequence = ((int) $request->sequence_which_just_been_watched) + 1;
    
            }

            $progress = $this->progress_service->update_progress($progress, $current_overall_progress_status);

            return redirect()->route('course.teacher.load_course_content', ['courseID' => $course->id, 'desired_sequence' => $progress->get_next_sequence()]);

        }
        
        dd('something went wrong!');
    }

    public function course_quiz_just_been_submited(Request $request){

        $course = $this->course_service->find($request->courseID);

        $all_points = collect();

        foreach($course->quizzes as $quiz){

            foreach($quiz->questions as $question){

                $all_points->push($question->points);

            }

        }

        $quiz = $this->course_service->find_quiz($request->quizID);

        $submitted_answers = $request->except(['courseID', 'sequence_which_just_been_watched', '_token', 'quizID']);
        
        $obtained_mark = 0;

        foreach ($submitted_answers as $question_id => $answer) {
            
            $question = $quiz->questions()->where('id', $question_id)->first();

            if($question->answer == $answer){

                $obtained_mark = $obtained_mark + $question->points;

            }

        }

        
        $obtained_mark = round(($obtained_mark/$all_points->sum()) * 100);

        //part 2
        $course_sequence = $this->course_service->sequence_list($course->id);

        $logged_in_teacher = get_current_teacher() ? get_current_teacher() : get_empty_teacher();

        $progress = $this->progress_service->get_progress($course->id, $logged_in_teacher->id);

        $current_overall_progress_status = $progress->get_current_overall_status();
        
        $current_overall_progress_status->progress = (int) round(($request->sequence_which_just_been_watched / $course->no_of_chapters()) * 100);

        $current_overall_progress_status->current_sequence = ((int) $request->sequence_which_just_been_watched);

        if(count($course_sequence) > $request->sequence_which_just_been_watched){

            $current_overall_progress_status->next_sequence = ((int) $request->sequence_which_just_been_watched) + 1;

        }
        
        $current_overall_progress_status->total_mark = $current_overall_progress_status->total_mark + $obtained_mark;
        
        $progress = $this->progress_service->update_progress($progress, $current_overall_progress_status);

        //part 3
        

        return redirect()->route('course.teacher.load_course_content', ['courseID' => $course->id, 'desired_sequence' => $progress->get_next_sequence()]);

    }


    // *************************SSL COM***********************************************

    public function purchase_course(Request $request, $courseID, $teacherID){

        // $unlock_result = $this->teacherCourse_bus->purchase_course_for_teacher($courseID, $teacherID);

        $course = $this->course_service->find($courseID);
        
        $teacher = $this->teacher_service->find($teacherID);

        $amount = $course->sale_price ? $course->sale_price : $course->price;

        $payment_id = "TR".strtoupper(Str::random(8));

        $data = [
            'amount'   => (int) $amount,
            'teacher'    => $teacher,
            'payment_id' => $payment_id,
            'product_name' =>  $course->title,
            'product_category' => 'Course',
        ];

        DB::table('temporary_payments')->insert(['details' => json_encode([
            'amount'   => (int) $amount,
            'teacher'    => $teacher,
            'course' => $course,
            'type' => 'Course',
        ]), 'payment_id' => $payment_id]);

        $paymentData = $this->createPayment($data);

        $status = $this->makePayment($paymentData);


        return redirect()->route('website.courses.single', $courseID);

    }


    private function createPayment($paymentData){

        $post_data = array();
        if(env('APP_ENV') == 'local') {
            $post_data['store_id'] = env('TEST_SSL_STORE_ID');
            $post_data['store_passwd'] = env('TEST_SSL_STORE_PASSWORD');
        } elseif(env('APP_ENV') == 'production') {
            $post_data['store_id'] = env('LIVE_SSL_STORE_ID');
            $post_data['store_passwd'] = env('LIVE_SSL_STORE_PASSWORD');
        }

        $post_data['total_amount'] = $paymentData['amount'];
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $paymentData['payment_id'];
        $post_data['success_url'] = route('sslcom.course.purchase.complete');
        $post_data['fail_url'] = route('sslcom.course.purchase.complete');
        $post_data['cancel_url'] = route('sslcom.course.purchase.complete');

        $post_data['emi_option'] = "0";

        $post_data['cus_name'] = $paymentData['teacher']->username;
        $post_data['cus_email'] = $paymentData['teacher']->email;
        $post_data['cus_add1'] = $paymentData['teacher']->full_address;
        $post_data['cus_city'] = 'Dhaka';
        $post_data['cus_postcode'] = '1207';
        $post_data['cus_country'] = 'Bangladesh';
        $post_data['cus_phone'] = $paymentData['teacher']->phone;

        $post_data['shipping_method'] = "NO";
        $post_data['num_of_item'] = "1";

        $post_data['product_name'] = $paymentData['product_name'];
        $post_data['product_category'] = $paymentData['product_category'];
        $post_data['product_profile'] = "general";

        return $post_data;
    }


    private function makePayment($paymentData) {

        # REQUEST SEND TO SSLCOMMERZ
        if(env('APP_ENV') == 'local') {
            $direct_api_url = env('TEST_SSL_TRANSACTION_API');
        } elseif(env('APP_ENV') == 'production') {
            $direct_api_url = env('LIVE_SSL_TRANSACTION_API');
        }

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $direct_api_url );
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POST, 1 );
        curl_setopt($handle, CURLOPT_POSTFIELDS, $paymentData);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


        $content = curl_exec($handle);
        
        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        
        if($code == 200 && !( curl_errno($handle))) {
            curl_close( $handle);
            $sslcommerzResponse = $content;
            
        } else {
            curl_close( $handle);
            echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
            exit;
        }

        # PARSE THE JSON RESPONSE
        $sslcz = json_decode($sslcommerzResponse, true );


        if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="" ) {
            
            header('Access-Control-Allow-Origin: *');

            return redirect()->to($sslcz['GatewayPageURL'])->send();

        } else {
            echo "error!";
        }

    }

    public function complete(Request $request){
        // Ipn validation
        $ipn_data = array();
        $ipn_data['val_id'] = $request->val_id;

        if(env('APP_ENV') == 'local') {
            $ipn_data['store_id'] = env('TEST_SSL_STORE_ID');
            $ipn_data['store_passwd'] = env('TEST_SSL_STORE_PASSWORD');
        } elseif(env('APP_ENV') == 'production') {
            $ipn_data['store_id'] = env('LIVE_SSL_STORE_ID');
            $ipn_data['store_passwd'] = env('LIVE_SSL_STORE_PASSWORD');
        }

        if(env('APP_ENV') == 'local') {
            $direct_validation_api_url = env('TEST_SSL_VALIDATION_API');
        } elseif(env('APP_ENV') == 'production') {
            $direct_validation_api_url = env('LIVE_SSL_VALIDATION_API');
        }

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $direct_validation_api_url );
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POST, 1 );
        curl_setopt($handle, CURLOPT_POSTFIELDS, $ipn_data);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


        $content = curl_exec($handle );

        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        try{

            $status = '';

            if($request->status == "VALID") {
                
                $status = 'success';

                $json_data = DB::table('temporary_payments')->where(['payment_id' => $request->tran_id])->first();

                $data_details = json_decode($json_data->details);

                $teacher = $this->teacher_service->find($data_details->teacher->id);

                $course= $this->course_service->find($data_details->course->id);

                $teacher->courses()->attach($data_details->course->id, ['created_at' => Carbon::now()]);

                $progress = $this->progress_service->create_progress($data_details->course->id, $teacher->id, [
                    'enrolled' => true,
                    'progress' => 0,
                    'current_sequence' => 0,
                    'next_sequence' => 1,
                    'total_mark' => 0,
                ]);

                $payment = new Payment();

                $payment->amount = $data_details->amount;

                $payment->teacher_id = $data_details->teacher->id;

                $payment->payment_id = $request->tran_id;

                $course->payments()->save($payment);

                DB::table('temporary_payments')->where(['payment_id' => $request->tran_id])->delete();

                Auth::guard('web-teacher')->login($teacher);

                $request->session()->regenerate();

                return redirect()->route('website.courses.single', $course->id);

            } else{

                $status = 'failed';
                
                dd($status);
            }
        } catch(\Exception $e) {

            return response()->json([
                'status'    => 'error',
                'message'   => $e->getMessage(),
            ], 420);

        }
    }


}
