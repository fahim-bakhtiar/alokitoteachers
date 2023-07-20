<?php

namespace App\Http\Controllers\web\Admin\CourseManagement;

use App\Models\Faculty;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CourseService;
use App\Services\TeacherService;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    protected $course_service;

    protected $teacher_service;

    public function __construct(CourseService $course_service, TeacherService $teacher_service){

        $this->course_service = $course_service;

        $this->teacher_service = $teacher_service;

    }

    public function show_create_form(){

        $categories = Category::all();

        $faculties = Faculty::all();

        return view('admin.dashboard.course-management.create_course', compact('categories', 'faculties'));

    }

    public function create(Request $request){
        
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'learning_objective' => 'required',
            'price' => 'required|integer',
            'sale_price' =>  $request->sale_price != null ? 'integer' : '',
            'certificate_price' => 'required|integer',
            'status' => 'required',
            'preview_video' => 'required',
            'advisors' => 'required',
            'designers' => 'required',
            'facilitators' => 'required',
        ]);
        
        $course = $this->course_service->create($request);

       

        return redirect()->back()->with('success', 'New Course is created successfully!');

    }

    public function list(){

        set_page_name('course-mgt-list');

        $courses = $this->course_service->courses();

        foreach($courses as $course){

            $course->edit_link = route('course-management.course.edit', $course->id);

            if($course->status == 'inactive'){

                $course->activation_link = route('course-management.course.avtivate', $course->id);
            }
            else{
                $course->activation_link = route('course-management.course.deavtivate', $course->id);
            }

            $course->sequence_link = route('course-management.course.sequence', $course->id);

            $course->enroll_teacher_link = route('course-management.course.enroll-teacher-view', $course->id);
            

        }

        return view('admin.dashboard.course-management.list_course', compact('courses'));

    }

    public function show_edit_form(Request $request, $id){

        $course = $this->course_service->find($id);

        $categories = Category::all();

        $faculties = Faculty::all();

        $faculty_types = $course->get_IDarray_of_faculties_by_types();

        $current_advisors = $faculty_types['advisors'];

        $current_designers = $faculty_types['designers'];

        $current_facilitators = $faculty_types['facilitators'];


        return view('admin.dashboard.course-management.edit_course', compact('course', 'categories', 'faculties', 'current_advisors', 'current_designers', 'current_facilitators'));

    }

    public function update(Request $request, $id){
        
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'learning_objective' => 'required',
            'price' => 'required|integer',
            'sale_price' =>  $request->sale_price != null ? 'integer' : '',
            'certificate_price' => 'required|integer',
            'status' => 'required',
            'preview_video' => 'required',
            'advisors' => 'required',
            'designers' => 'required',
            'facilitators' => 'required',
        ]);

        $course = $this->course_service->update($id,$request);

        return redirect()->back()->with('success', 'Course data is updated successfully!');

    }

    public function activate($id){

        $result = $this->course_service->is_qualified_for_activation($id);
        
        return redirect()->back()->with('result', $result);

    }

    public function deactivate($id){

        $course = $this->course_service->find($id);

        $course->status = 'inactive';

        $course->save();

        return redirect()->back()->with('success', 'Course successfully deactivated');

    }

    // SEQUENCE------------------------------------------------------------------------

    public function sequence($id){

        $course = $this->course_service->find($id);

        $list = $this->course_service->sequence_list($id);

        return view('admin.dashboard.course-management.sequence', compact('course', 'list'));

    }

    public function set_sequence(Request $request, $id){

        $result = $this->course_service->set_sequence($request);

        $course = $this->course_service->find($request->course_id);

        $list = $this->course_service->sequence_list($request->course_id);

        if($result == null){

            return view('admin.dashboard.course-management.sequence', compact('course', 'list'))->with('warning', 'The sequence number is alreday in use. Please provide a different number');

        }

        return redirect()->route('course-management.course.sequence', $course->id)->with('success', 'The sequence number is updated!');


    }

    // Video-------------------------------------------------------------------

    public function create_video($id){

        $course = $this->course_service->find($id);

        $course_sequence_numbers_latest = $this->course_service->course_sequence_numbers_latest($id);

        return view('admin.dashboard.course-management.video.create_video', compact('course', 'course_sequence_numbers_latest'));

    }

    public function store_video(Request $request, $id){

        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'detail' => 'required',
            'sequence' => 'required|integer',
            'course_id' => 'required'
        ]);

        $video = $this->course_service->add_video($request);

        if($video == null){

            return redirect()->back()->with('warning', 'The sequence number is alreday taken! Please provide a different number');

        }

        return redirect()->back()->with('success', 'Video is added successfully!');

    }

    public function edit_video($id){

        $video = $this->course_service->find_video($id);

        return view('admin.dashboard.course-management.video.edit_video', compact('video'));

    }

    public function update_video(Request $request, $id){
        
        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'detail' => 'required',
            'sequence' => 'required|integer',
            'course_id' => 'required'
        ]);
        
        $video = $this->course_service->update_video($id, $request);

        if($video == null){

            return redirect()->back()->with('warning', 'The sequence number is alreday taken! Please provide a different number');

        }

        return redirect()->back()->with('success', 'Video is updated successfully!');

    }

    //Quiz-----------------------------------------------------

    public function create_quiz($id){

        $course = $this->course_service->find($id);

        $course_sequence_numbers_latest = $this->course_service->course_sequence_numbers_latest($id);

        return view('admin.dashboard.course-management.quiz.create_quiz', compact('course', 'course_sequence_numbers_latest'));

    }

    public function store_quiz(Request $request, $id){

        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'sequence' => 'required|integer',
            'course_id' => 'required'
        ]);

        $quiz = $this->course_service->add_quiz($request);

        if($quiz == null){

            return redirect()->back()->with('warning', 'The sequence number is alreday taken! Please provide a different number');

        }

        return redirect()->back()->with('success', 'Quiz is added successfully!');

    }

    public function edit_quiz($id){

        $quiz = $this->course_service->find_quiz($id);

        return view('admin.dashboard.course-management.quiz.edit_quiz', compact('quiz'));

    }

    public function update_quiz(Request $request, $id){
        
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'sequence' => 'required|integer',
            'course_id' => 'required'
        ]);
        
        $quiz = $this->course_service->update_quiz($id, $request);

        if($quiz == null){

            return redirect()->back()->with('warning', 'The sequence number is alreday taken! Please provide a different number');

        }

        return redirect()->back()->with('success', 'Quiz is updated successfully!');

    }


    //Question---------------------------------------------------------

    public function create_question($id){

        $quiz = $this->course_service->find_quiz($id);

        $latest_in_sequence = $this->course_service->question_latest_sequence($id);

        return view('admin.dashboard.course-management.question.create_question', compact('quiz', 'latest_in_sequence'));

    }

    public function store_question(Request $request, $id){

        $request->validate([
            'question' => 'required',
            'sequence' => 'required|integer',
            'points' => 'required|integer',
            'option_1' => 'required',
            'option_2' => 'required',
            'option_3' => 'required',
            'option_4' => 'required',
            'answer' => 'required',
            'quiz_id' => 'required'
        ]);

        $question = $this->course_service->add_question($request);

        if($question == null){

            return redirect()->back()->with('warning', 'The sequence number is alreday taken in this quiz! Please provide a different number');

        }

        return redirect()->route('course-management.course.question.create', $id)->with('success', 'Question is added successfully!');

    }

    public function list_questions($id){

        $quiz = $this->course_service->find_quiz($id);

        return view('admin.dashboard.course-management.question.list_questions', compact('quiz'));

    }

    public function edit_question($id){

        $question = $this->course_service->find_question($id);

        return view('admin.dashboard.course-management.question.edit_question', compact('question'));

    }

    public function update_question(Request $request, $id){
        
        $request->validate([
            'question' => 'required',
            'sequence' => 'required|integer',
            'points' => 'required|integer',
            'option_1' => 'required',
            'option_2' => 'required',
            'option_3' => 'required',
            'option_4' => 'required',
            'answer' => 'required',
            'quiz_id' => 'required'
        ]);
        
        $question = $this->course_service->update_question($id, $request);

        if($question == null){

            return redirect()->back()->with('warning', 'The sequence number is alreday taken in this quiz! Please provide a different number');

        }

        return redirect()->back()->with('success', 'Question is updated successfully!');

    }

    public function enrollTeacherView($course_id)
    {
        $teachers = $this->teacher_service->dropdownForEnrollment($course_id);

        return view('admin.dashboard.course-management.enroll_teacher', compact('course_id', 'teachers'));
    }

    public function enrollTeacher(Request $request, $course_id)
    {
        $request->validate([
            'teacher_ids' => 'required | array'
        ], [
            'teacher_ids.required' => 'The field cannot be empty !'
        ]);

        $teachers = $this->course_service->enrollTeacher($request, $course_id);

        return redirect()->route('course-management.course.list')->with(['success' => 'Teachers Enrolled Successfully !']);
    }


}
