<?php

namespace App\Http\Controllers\web\Admin;

use Illuminate\Http\Request;
use App\Services\AdminService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    protected $admin_service;

    public function __construct(AdminService $admin_service){

        $this->admin_service = $admin_service;

    }

    public function show_login_form(){

        if(!is_admin_logged_in()){
            
            return view('admin.auth.login');

        }

        return redirect()->back();

    }

    public function perform_login(Request $request){

        $request->validate([

            'email' => 'required',

            'password' => 'required'

        ]);
        
        if(Auth::guard('web-admin')->attempt($request->only('email','password'))){
            
            return redirect()->route('admin.dashboard');

        }

        return redirect()->back()->with('info', "email or password didn't match");

    }

    public function perform_logout(){

        Auth::guard('web-admin')->logout();

        return redirect()->route('admin.login');

    }

    public function show_dashboard(){

        set_page_name('dashboard');
        
        return view('admin.dashboard.main');

    }
}
