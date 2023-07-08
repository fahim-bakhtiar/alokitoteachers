<?php

namespace App\Http\Controllers\web\Website;

use Illuminate\Http\Request;
use App\Services\TeacherService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AuthPageController extends Controller
{
    private $teacher_service;

    public function __construct(TeacherService $teacher_service)
    {
        $this->teacher_service = $teacher_service;
    }

    public function signup_page(){

        return view('website.auth.signup');

    }

    public function attempt_signup(Request $request){
        
        $request->validate([
            'first_name' => 'required',
            'accountType' => 'required',
            'email' => 'required|unique:teachers',
            'phone' => 'required|unique:teachers',
            'password' => 'required|min:8|confirmed',
        ],[
            'fist_name'    => 'Name is required.',
            'phone'    => 'Phone number is required.',
            'email.required'    => 'Email is required for signing up',
            'email.unique'    => 'This email has alreday been taken',
            'phone.unique'    => 'This phone number is alreday in use',
            'email.email'    => 'Must be a valid email address',
            'password.same' => 'The password dosen\'t match',
        ]);

        if($request->accountType == 'teacher'){

            $teacher = $this->teacher_service->create($request);

            Session::flash('message', 'Your account has been successfully created'); 

            Session::flash('alert-class', 'alert-success'); 

            return redirect()->route('website.auth.teacher.signin');

        }
        

    }

    
}
