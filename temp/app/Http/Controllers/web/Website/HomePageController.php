<?php

namespace App\Http\Controllers\web\Website;

use Illuminate\Http\Request;
use App\Services\CourseService;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{

    protected $course_service;

    public function __construct(CourseService $course_service){

        $this->course_service = $course_service;

    }
    
    public function homepage(){

        $courses = $this->course_service->active_courses()->take(6);

        return view('website.homepage.home', compact('courses'));

    }
}
