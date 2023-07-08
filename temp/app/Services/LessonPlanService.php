<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Lesson;
use App\Models\Teacher;
use App\Models\LessonPlan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class LessonPlanService{

    public function store_lesson_plan($data){
        
        $lessonplan = LessonPlan::create($data->all());

        return $lessonplan;

    }

    public function update($id, $data){

        $lp = LessonPlan::findOrFail($id);
        
        return $lp->update($data->only('price', 'status', 'title','class','subject','details', 'duration','date','learning_outcomes'));

    }

    // SEARCHES

    public function find($id){
        
        $lessonplan = LessonPlan::findOrFail($id);

        return $lessonplan;

    }

    public function find_all(){
        
        $lesson_plans = LessonPlan::all();
       
        return $lesson_plans;

    }
    

    public function find_by_subject($subject){

        return LessonPlan::where('subject', $subject)->get();

    }

    public function find_by_grade($grade){

        return LessonPlan::where('class', $grade)->get();

    }
    

    public function search($subject, $grade, $min_price, $max_price){
        
        $lesson_plans = $this->find_all();
        
        if($subject != 0){
            
            $lesson_plans = $lesson_plans->filter(function($item) use($subject){

                return $item->subject == $subject;

            })->values();

        }

        if($grade != 0){
            
            $lesson_plans = $lesson_plans->filter(function($item) use($grade){

                return $item->class == $grade;

            })->values();

        }

        $lesson_plans = $lesson_plans->filter(function($item) use($min_price, $max_price){

            return $item->price >= $min_price && $item->price <= $max_price;

        })->values();

        
        return $lesson_plans;
    }

    public function find_by_phone($phone){

        if($teacher = Teacher::where('phone', $phone)->first()){

           return $teacher;

        }

       return null;

   }

    //Lessons
    
    public function store_lesson($data){

        $max = Lesson::where('lessonplan_id', $data['lessonplan_id'])->max('sequence');

        if($max == null){

            $max = 1;

        }else{

            $max = $max + 1;

        } 
       

        $data['sequence'] = $max;

        $lesson = Lesson::create($data);

        return $lesson;
        
    }


    public function update_lesson($data, $lessonid){

        $lesson = Lesson::find($lessonid);

        $lesson->update($data);

        return $lesson;
        
    }

    public function find_all_lessons_by_lessonplan($id){

        $lesson = Lesson::with('lessonplan')->where('lessonplan_id', $id)->get();

        return $lesson;
        
    }

    public function find_lesson_by_id($id){

        return Lesson::with('lessonplan')->find($id);

    }

    public function find_lesson_all(){

        return Lesson::with('lessonplan')->get();

    }


    

}