<?php

namespace App\Bus;

use Carbon\Carbon;
use App\Services\CourseService;
use App\Services\PaymentService;
use App\Services\TeacherService;
use App\Services\ProgressService;



class TeacherCourseBus{

    protected $course_service;
    protected $teacher_service;
    protected $payment_service;
    protected $progress_service;

    public function __construct(CourseService $course_service, TeacherService $teacher_service, PaymentService $payment_service, ProgressService $progress_service){

        $this->course_service = $course_service;
        $this->teacher_service = $teacher_service;
        $this->payment_service = $payment_service;
        $this->progress_service = $progress_service;

    }


    public function unlock_course_for_teacher($courseID, $teacherID){
        
        $course = $this->course_service->find($courseID);
        
        $teacher = $this->teacher_service->find($teacherID);
        
        $teacher->courses()->attach($course->id, ['created_at' => Carbon::now()]);
        
        $progress = $this->progress_service->create_progress($courseID, $teacherID, [
            'enrolled' => true,
            'progress' => 0,
            'current_sequence' => 0,
            'next_sequence' => 1,
            'total_mark' => 0,
        ]);


        $current_subscription = $teacher->current_subscription();

        $current_subscription->remaining_courses = $current_subscription->remaining_courses - 1;

        $current_subscription->save();

        return [
            'status' => 1,
            'teacher' => $teacher,
            'course' => $course,
        ];

    }

    public function purchase_course_for_teacher($courseID, $teacherID){
        
        $course = $this->course_service->find($courseID);
        
        $teacher = $this->teacher_service->find($teacherID);
        
        if($course->sale_price){

            $payment = $this->payment_service->create($course->sale_price, $teacher->id, $course);

        }else{

            $payment = $this->payment_service->create($course->price, $teacher->id, $course);

        }
        

        $teacher->courses()->attach($course->id, ['created_at' => Carbon::now()]);

        $progress = $this->progress_service->create_progress($courseID, $teacherID, [
            'enrolled' => true,
            'progress' => 0,
            'current_sequence' => 0,
            'next_sequence' => 1,
            'total_mark' => 0,
        ]);

        return [
            'status' => 1,
            'teacher' => $teacher,
            'course' => $course,
        ];

    }

    public function teacher_course_status($courseID, $teacherID){
        
        $teacher = $this->teacher_service->find($teacherID);

        if(!$teacher){

            return [
                'enrolled' => false,
                'progress' => 0,
                'current_sequence' => 0,
                'total_mark' => 0,
            ];

        }

        foreach($teacher->courses as $course){

            if($course->id == $courseID){
    
                // $progress = ($course->pivot->current_sequence / $course->no_of_chapters()) * 100;
                $progress = $this->progress_service->get_progress($courseID, $teacherID);
                
                return json_decode($progress->current_status);
    
            }
    
        }
    
        return [
            'enrolled' => false,
            'progress' => 0,
            'current_sequence' => 0,
            'total_mark' => 0,
        ];

    }


}