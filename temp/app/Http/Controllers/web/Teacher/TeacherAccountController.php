<?php

namespace App\Http\Controllers\web\Teacher;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Services\TeacherService;
use App\Services\InnovationService;
use App\Http\Controllers\Controller;

class TeacherAccountController extends Controller
{

    protected $teacher_service;

    protected $innovation_service;

    public function __construct(TeacherService $teacher_service, InnovationService $innovation_service){

        $this->teacher_service = $teacher_service;

        $this->innovation_service = $innovation_service;

    }
    
    public function get_profile(){

        $logged_in_teacher = auth()->guard('web-teacher')->user();

        $innovations = $this->innovation_service->getInnovations($logged_in_teacher->id);
        // dd($logged_in_teacher->courses);
        return view('teacher.profile', compact('logged_in_teacher', 'innovations'));

    }

    public function get_profile_edit_form(){

        $logged_in_teacher = auth()->guard('web-teacher')->user();
        
        return view('teacher.profile-edit', compact('logged_in_teacher'));

    }

    public function store_data_of_profile_edit_form(Request $request){

        // dd($request->all());
       

        $request->validate([
            'first_name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'district_id' => 'required|exists:districts,id',
            'username' => 'required|unique:teachers,username,'.get_current_teacher()->id,
            'password' => $request->password != null ? Rule::when(true, ['min:8', 'confirmed']) : '', 
        ]);

        $teacher = $this->teacher_service->update(get_current_teacher()->id,$request);

        return redirect()->back()->with('success', 'Your account is updated successfully!');

    }
}
