<?php

namespace App\Http\Controllers\web\Admin\UserManagement;

use App\Models\Category;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Services\TeacherService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TeachersCrudController extends Controller
{
    
    protected $teacher_service;

    public function __construct(TeacherService $teacher_service){

        set_page_name('teacher-mgt');

        $this->teacher_service = $teacher_service;

    }

    public function show_create_form(){

        $districts = District::all();

        $grades = Category::where('type', 'grade')->get();

        $mediums = Category::where('type', 'medium')->get();

        return view('admin.dashboard.user-management.teacher.create_teacher', compact('districts', 'grades', 'mediums'));

    }

    public function create(Request $request){
        // dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:teachers',
            'phone' => 'required|unique:teachers|min:11',
            'username' => 'required|unique:teachers',
            'password' => 'required|min:8|confirmed',
        ]);

        $teacher = $this->teacher_service->create($request);

        return redirect()->back()->with('success', 'New Teacher is created successfully!');

    }

    public function show_edit_form(Request $request, $id){

        $teacher = $this->teacher_service->find($id);
        
        $districts = District::all();

        $grades = Category::where('type', 'grade')->get();

        $mediums = Category::where('type', 'medium')->get();
        
        return view('admin.dashboard.user-management.teacher.edit_teacher', compact('teacher', 'districts', 'grades', 'mediums'));

    }

    public function update(Request $request, $id){

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:teachers,email,'.$id,
            'phone' => 'required||min:11|unique:teachers,phone,'.$id,
            'username' => 'required|unique:teachers,username,'.$id,
            'password' => $request->password != null ? Rule::when(true, ['min:8', 'confirmed']) : '', 
        ]);

        $teacher = $this->teacher_service->update($id,$request);

        return redirect()->back()->with('success', 'Teacher data is updated successfully!');

    }

    public function teachers(){

        $teachers = $this->teacher_service->teachers();

        foreach($teachers as $teacher){

            $teacher->edit_link = route('user-management.teacher.edit', $teacher->id);
            

        }

        return view('admin.dashboard.user-management.teacher.list_teacher', compact('teachers'));

    }

}
