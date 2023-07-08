<?php

use App\Models\Package;
use App\Models\Teacher;
use App\Models\Category;
use App\Models\District;
use App\Models\Progress;
use App\Models\Subscription;
use App\Models\Catagorizable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;


function asset_url($url){

    return asset('/public/'.$url);

}

//global vaiables


function get_logged_in_admin_user(){

    return Auth::guard('web-admin')->user();

}

function is_admin_logged_in(){

    return Auth::guard('web-admin')->check();

}

function set_page_name($name){
	
    Config::set('settings.page', $name);

}

function get_page_name(){

    return 	Config::get('settings.page');

}


function admin_can($permission){

    return get_logged_in_admin_user()->can($permission);

}

function all_districts(){

    return District::orderBy('name', 'asc')->get();

}

function all_grade_levels(){

    return Category::where('type', 'grade_level')->orderBy('name', 'asc')->get();

}

// Teacher helpers

function get_current_teacher(){

    return auth()->guard('web-teacher')->user();

}



// Empty helpers

function get_empty_package(){

    $package  = new Package();

    $package->id = 0;

    return $package;

}

function get_empty_teacher(){

    $teacher  = new Teacher();

    $teacher->id = 0;

    return $teacher;

}

function get_empty_subscription(){

    $subscription  = new Subscription();

    $subscription->id = 0;

    $subscription->remaining_courses = -1;

    $subscription->remaining_workshops = -1;

    $subscription->remaining_resources = -1;

    return $subscription;

}

function get_empty_catagorizable(){

    $catagorizable  = new Catagorizable();

    $catagorizable->id = 0;

    return $catagorizable;

}

function get_empty_progress(){

    $progress  = new Progress();

    $progress->id = 0;

    $progress->course_id = 0;

    $progress->teacher_id = 0;

    $progress->current_status = json_encode([
        'enrolled' => false,
        'progress' => 0,
        'current_sequence' => 0,
        'total_mark' => 0,
    ]);

    return $progress;

}