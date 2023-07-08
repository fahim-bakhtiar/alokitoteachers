<?php

namespace App\Http\Controllers\web\Teacher;

use Illuminate\Http\Request;
use App\Services\TeacherService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TeacherAuthController extends Controller
{
    protected $teacher_service;

    public function __construct(TeacherService $teacher_service){

        $this->teacher_service = $teacher_service;

    }

    public function teacher_signin_page(){

        return view('website.auth.teacher.signin');

    }
    

    public function teacher_attempt_signin(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(auth()->guard('web-teacher')->attempt($request->only('email', 'password'))){

            return redirect()->route('teacher.profile');

        }else{
            
            return redirect()->back()->with('error-message', 'Credentials you provided did not match');

        }

    }

    public function teacher_attempt_signout(Request $request){

        auth()->guard('web-teacher')->logout();

        return redirect()->route('website.auth.teacher.signin');

    }
}
