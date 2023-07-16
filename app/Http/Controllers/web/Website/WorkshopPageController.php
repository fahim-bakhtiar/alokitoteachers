<?php

namespace App\Http\Controllers\web\website;

use Carbon\Carbon;
use App\Models\Batch;
use App\Models\Payment;
use App\Models\Workshop;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\TeacherService;
use App\Services\WorkshopService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WorkshopPageController extends Controller
{

    protected $workshop_service;
    
    protected $teacher_service;

    public function __construct(WorkshopService $workshop_service, TeacherService $teacher_service){

        $this->workshop_service = $workshop_service;

        $this->teacher_service = $teacher_service;

    }
    
    public function deliver_workshops(){

        $workshops = Workshop::where('status', 'active')->get();

        return view('website.workshops.index', compact('workshops'));

    }

    public function deliver_batches($workshop_id){

        $workshop = Workshop::find($workshop_id);

        $logged_in_teacher = get_current_teacher() ? get_current_teacher() : get_empty_teacher();

        $batches = Batch::where('workshop_id', $workshop_id)->get();
        
        return view('website.workshops.batches', compact('batches', 'workshop', 'logged_in_teacher'));

    }

    public function purchase_workshop(Request $request, $workshop_id, $teacherID){

        // $unlock_result = $this->teacherCourse_bus->purchase_course_for_teacher($courseID, $teacherID);

        $workshop = Workshop::find($workshop_id);
        
        $teacher = $this->teacher_service->find($teacherID);

        $amount = $workshop->sale_price ? $workshop->sale_price : $workshop->price;

        $payment_id = "TR".strtoupper(Str::random(8));

        $data = [
            'amount'   => (int) $amount,
            'teacher'    => $teacher,
            'payment_id' => $payment_id,
            'product_name' =>  $workshop->name,
            'product_category' => 'Workshop',
        ];

        DB::table('temporary_payments')->insert(['details' => json_encode([
            'amount'   => (int) $amount,
            'teacher'    => $teacher,
            'workshop' => $workshop,
            'type' => 'Workshop',
        ]), 'payment_id' => $payment_id]);

        $paymentData = $this->createPayment($data);

        $status = $this->makePayment($paymentData);


        return redirect()->route('website.workshops.all');

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
        $post_data['success_url'] = route('sslcom.workshop.purchase.complete');
        $post_data['fail_url'] = route('sslcom.workshop.purchase.complete');
        $post_data['cancel_url'] = route('sslcom.workshop.purchase.complete');

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

                $workshop = Workshop::find($data_details->workshop->id);
                //-------------
                $teacher->workshops()->attach($data_details->workshop->id, ['created_at' => Carbon::now()]);



                $payment = new Payment();

                $payment->amount = $data_details->amount;

                $payment->teacher_id = $data_details->teacher->id;

                $payment->payment_id = $request->tran_id;

                $workshop->payments()->save($payment);

                DB::table('temporary_payments')->where(['payment_id' => $request->tran_id])->delete();

                Auth::guard('web-teacher')->login($teacher);

                $request->session()->regenerate();

                return redirect()->route('website.workshops.all');

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

    public function privacy(){

        return view('website.policies.privacy');

    }

    public function terms(){

        return view('website.policies.terms');

    }
}
