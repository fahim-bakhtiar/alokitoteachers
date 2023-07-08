<?php

namespace App\Http\Controllers\web\Website;

use App\Models\CourseVideo;
use Illuminate\Http\Request;
use App\Bus\TeacherCourseBus;
use App\Services\CourseService;
use App\Services\ProgressService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CoursesPageController extends Controller
{
    protected $course_service;
    protected $teacherCourse_bus;
    protected $progress_service;

    public function __construct(CourseService $course_service, ProgressService $progress_service,TeacherCourseBus $teacherCourse_bus){

        $this->course_service = $course_service;
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

    public function purchase_course(Request $request, $courseID, $teacherID){

        $unlock_result = $this->teacherCourse_bus->purchase_course_for_teacher($courseID, $teacherID);

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


}
