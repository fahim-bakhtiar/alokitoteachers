<?php

namespace App\Http\Controllers\web\Admin\FacultyManagement;

use Illuminate\Http\Request;
use App\Services\CourseService;
use App\Services\FacultyService;
use App\Http\Controllers\Controller;

class FacultyController extends Controller
{
    protected $course_service;
    protected $faculty_service;

    public function __construct(CourseService $course_service, FacultyService $faculty_service){

        $this->course_service = $course_service;
        $this->faculty_service = $faculty_service;

    }

    public function show_create_form(){

        return view('admin.dashboard.faculty-management.create');

    }

    public function store(Request $request){

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'details' => 'required',
        ]);

        $faculty = $this->faculty_service->store($request);

        return redirect()->route('faculty-management.faculty.create')->with('success', 'New Faculty is created successfully!');

    }

    public function list(){

        $faculties = $this->faculty_service->index();

        foreach($faculties as $faculty){

            $faculty->edit_link = route('faculty-management.faculty.edit', $faculty->id);

            $faculty->profile_image = $faculty->getAbsoluteProfileImagePath();
            
        }

        return view('admin.dashboard.faculty-management.list', compact('faculties'));

    }

    public function show_edit_form($id){
        
        $faculty = $this->faculty_service->find($id);

        return view('admin.dashboard.faculty-management.edit', compact('faculty'));

    }

    public function update(Request $request, $id){

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'details' => 'required',
        ]);

        $faculty = $this->faculty_service->update($request, $id);
        
        return redirect()->back()->with('success', 'faculty updated successfully');

    }
}
