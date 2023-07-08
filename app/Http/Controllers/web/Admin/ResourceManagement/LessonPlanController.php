<?php

namespace App\Http\Controllers\web\Admin\ResourceManagement;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Services\LessonPlanService;
use App\Http\Controllers\Controller;

class LessonPlanController extends Controller
{

    protected $lessonplan_service;

    protected $category_service;

    public function __construct(LessonPlanService $lessonplan_service, CategoryService $category_service){

        set_page_name('lesson-plan-list');

        $this->lessonplan_service = $lessonplan_service;

        $this->category_service = $category_service;

    }

    public function lesson_plan_index(){

        set_page_name('lesson-plan-index');

        return view('admin.dashboard.resource-management.lesson-plan.index');

    }

    public function lesson_plan_create_form(){

        set_page_name('lesson-plan-create');

        $subjects = $this->category_service->subjects();

        $grades = $this->category_service->grades();

        return view('admin.dashboard.resource-management.lesson-plan.create', compact('subjects', 'grades'));

    }


    public function lesson_plan_store(Request $request){

        $request->validate([
            'title' => 'required',
            'class' => 'required',
            'learning_outcomes' => 'required',
            'status' => 'required',
            'details' => 'required',
            'price' => 'required|integer',
            'duration' => 'required',
            'subject' => 'required',
        ]);

        $lesson_plan = $this->lessonplan_service->store_lesson_plan($request);

        return redirect()->back()->with('success', 'New lesson plan is created successfully! Go ahead and add some lessons to it now!');

    }

    public function lesson_plan_list(){

        set_page_name('lesson-plan-list');

        $lesson_plans = $this->lessonplan_service->find_all();

        $subjects = $this->category_service->subjects();

        $grades = $this->category_service->grades();

        return view('admin.dashboard.resource-management.lesson-plan.list', compact('subjects', 'grades','lesson_plans'));

    }


    public function lesson_plan_edit_form($id){

        set_page_name('lesson-plan-list');

        $subjects = $this->category_service->subjects();

        $grades = $this->category_service->grades();

        $lp = $this->lessonplan_service->find($id);

        return view('admin.dashboard.resource-management.lesson-plan.edit', compact('subjects', 'grades', 'lp'));

    }

    public function update(Request $request, $id){

        set_page_name('lesson-plan-list');

        $lp = $this->lessonplan_service->update($id, $request);

        return redirect()->back()->with('success', 'Lesson plan is Updated successfully!');

    }

    public function search(Request $request){

        set_page_name('lesson-plan-list');

        $lesson_plans = $this->lessonplan_service->search($request->subject, $request->grade, explode(',', $request->price)[0], explode(';', $request->price)[1]);
        
        $subjects = $this->category_service->subjects();

        $grades = $this->category_service->grades();

        return view('admin.dashboard.resource-management.lesson-plan.list', compact('subjects', 'grades','lesson_plans'));
        
    }
}
