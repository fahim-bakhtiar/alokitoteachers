<?php

namespace App\Http\Controllers\web\Admin\ResourceManagement;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Services\LessonPlanService;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{

    protected $lessonplan_service;

    protected $category_service;

    public function __construct(LessonPlanService $lessonplan_service, CategoryService $category_service){

        set_page_name('lesson-plan-list');

        $this->lessonplan_service = $lessonplan_service;

        $this->category_service = $category_service;

    }

    
    public function lesson_create_form($id){

        $lessonplan = $this->lessonplan_service->find($id);

        return view('admin.dashboard.resource-management.lesson-plan.lesson.create', compact('lessonplan'));

    }
    public function lesson_edit_form($id){

        $lesson = $this->lessonplan_service->find_lesson_by_id($id);

        return view('admin.dashboard.resource-management.lesson-plan.lesson.edit', compact('lesson'));

    }

    public function lesson_store(Request $request){
        
        $request->validate([
            'segment' => 'required',
            'duration' => 'required',
            'activity' => 'required',
            'method' => 'required',
            'lessonplan_id' => 'required',
        ]);
        

        $data = $request->only(['duration','segment','activity', 'method','tools','reflection', 'lessonplan_id']);
        
        $lesson = $this->lessonplan_service->store_lesson($data);

        return redirect()->back()->with('success', 'New lesson is added successfully!');

    }

    public function lesson_update(Request $request, $lessonid){
        
        $request->validate([
            'segment' => 'required',
            'duration' => 'required',
            'activity' => 'required',
            'method' => 'required',
            'sequence' => 'required',
            'lessonplan_id' => 'required',
        ]);
        

        $data = $request->only(['duration','segment','activity', 'method','tools','reflection', 'lessonplan_id', 'sequence']);
        
        $lesson = $this->lessonplan_service->update_lesson($data, $lessonid);

        return redirect()->back()->with('success', 'lesson is updated successfully!');

    }


    public function lesson_list($id){

        set_page_name('lesson-plan-list');

        $lessonplan = $this->lessonplan_service->find($id);

        $lessons = $this->lessonplan_service->find_all_lessons_by_lessonplan($id);

        return view('admin.dashboard.resource-management.lesson-plan.lesson.list', compact('lessonplan','lessons'));

    }

    public function delete($id){

        $lesson = $this->lessonplan_service->find_lesson_by_id($id);

        $lesson_plan_id = $lesson->lessonplan_id;

        $lessons = $this->lessonplan_service->find_all_lessons_by_lessonplan($lesson_plan_id);

        $lessons = $lessons->filter(function($item) use ($lesson){

            if($item->sequence > $lesson->sequence){

                return true;

            }

        });

        foreach ($lessons as $item) {
            
            $item->sequence = $item->sequence - 1;

            $item->save();

        }

        $lesson->delete();

        return redirect()->back()->with('success', 'lesson is deleted successfully!');

    }

    public function set_sequence_form(Request $request, $lesson_plan_id){

        $lessonplan = $this->lessonplan_service->find($lesson_plan_id);

        $lessons = $this->lessonplan_service->find_all_lessons_by_lessonplan($lesson_plan_id);

        return view('admin.dashboard.resource-management.lesson-plan.lesson.sequence', compact('lessonplan','lessons'));

    }

    public function set_sequence_update(Request $request, $lessonplan_id){
        // dump($request->all());

        $lessons = $this->lessonplan_service->find_all_lessons_by_lessonplan($lessonplan_id);

        foreach ($lessons as $item) {
        
            $item->sequence = $request[$item->id];

            $item->save();

        }

        return redirect()->back()->with('success', 'Sequence updated successfully');

    }

}
