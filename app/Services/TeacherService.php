<?php

namespace App\Services;

use Exception;
use Carbon\Carbon;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Support\Str;
use App\Models\Catagorizable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TeacherService{

    public function create($data){
        
        $teacher = new Teacher();

        $teacher = $teacher->create($data->only('first_name','last_name','email', 'phone', 'school', 'school_address','experience', 'gender', 'full_address',  'qualifications', 'work_history', 'username'));

        if($data->dp){

            $image_data = json_decode($data->dp);

            $imageName = Str::random(10).'.'.'png';
            
            \File::put(storage_path(). '/app/public/images/teachers/' . $imageName, base64_decode($image_data->data));
            
            $teacher->dp= $imageName;

            $teacher->dp_path = 'public/images/teachers/'.$imageName;

        }

        $teacher->password = bcrypt($data->password);
        
        if($data->dob){

            $teacher->dob = Carbon::parse($data->dob);

        }

        if($data->district){

            $teacher->district_id = $data->district;

        }
        
        $teacher->save();

        if($data->grades_teaching){

            foreach($data->grades_teaching as $grade_id){

                $catagorizable = new Catagorizable();

                $catagorizable->category_id = $grade_id;

                $catagorizable->model_type = 'Teacher';

                $catagorizable->category_type = 'Grade';

                $catagorizable->model_id = $teacher->id;

                $catagorizable->save();

            }

        }
        
            
        if($data->curriculum){
            
            $catagorizable = new Catagorizable();

            $catagorizable->category_type = 'Medium';

            $catagorizable->category_id = $data->curriculum;

            $catagorizable->model_type = 'Teacher';

            $catagorizable->model_id = $teacher->id;

            $catagorizable->save();

        }
       
        return $teacher;

    }

    public function update($id, $data){

        $teacher = Teacher::findOrFail($id);
        // dd($data->all());
        $teacher->update($data->only('first_name','last_name','email', 'phone', 'school', 'school_address','experience', 'gender', 'full_address',  'qualifications','work_history', 'username'));

        if($data->password){ $teacher->password = bcrypt($data->password); }

        if($data->dob){ $teacher->dob = Carbon::parse($data->dob); }

        if($data->dp){

            if($teacher->dp_path){ Storage::delete($teacher->dp_path); }

            if($data->upload_type){

                $file_name = date('YmdHis') . "_" . mt_rand(1, 999999) . "." . $data->file('dp')->getClientOriginalExtension();

                $file_path = $data->file('dp')->storeAs('public/images/teachers', $file_name);

                $teacher->dp = $file_name;

                $teacher->dp_path = $file_path;

            }else{

                $image_data = json_decode($data->dp);
    
                $imageName = Str::random(10).'.'.'png';
                
                \File::put(storage_path(). '/app/public/images/teachers/' . $imageName, base64_decode($image_data->data));
                
                $teacher->dp= $imageName;
    
                $teacher->dp_path = 'public/images/teachers/'.$imageName;

            }

            

        }

        if($data->district_id){

            $teacher->district_id = $data->district_id;

        }

        if($data->school_district_id){

            $teacher->school_district_id = $data->school_district_id;

        }

        $teacher->save();

        if($data->grades_teaching){

            foreach($data->grades_teaching as $grade_id){

                if(!in_array($grade_id, $teacher->grades_array())){

                    $catagorizable = new Catagorizable();

                    $catagorizable->category_id = $grade_id;
    
                    $catagorizable->model_type = 'Teacher';
    
                    $catagorizable->category_type = 'Grade';
    
                    $catagorizable->model_id = $teacher->id;
    
                    $catagorizable->save();

                }

            }

            foreach($teacher->grades_array() as $existing_grade_id){

                if(!in_array($existing_grade_id, $data->grades_teaching)){

                    Catagorizable::where('category_id', $existing_grade_id)->where('model_id', $teacher->id)->where('model_type', 'Teacher')->delete();

                }

            }

        }
        
        
        if($data->curriculum){

            //if the data sent isn't alreday present in teachers existing array of mediums then add that entry there. If present, then ignore.

            if(!in_array($data->curriculum, $teacher->curriculum_array())){
                
                //if teacher alreday has an array of mediums then traverse that. 
                //remove the existing relation because only one entry of medium can be present for every teacher

                foreach($teacher->curriculum_array() as $existing_curriculum_id){
                    
                    Catagorizable::where('category_id', $existing_curriculum_id)->where('model_id', $teacher->id)->where('model_type', 'Teacher')->delete();
                }

                $catagorizable = new Catagorizable();

                $catagorizable->category_type = 'Medium';
    
                $catagorizable->category_id = $data->curriculum;
    
                $catagorizable->model_type = 'Teacher';
    
                $catagorizable->model_id = $teacher->id;
    
                $catagorizable->save();


            }

        }

        return $teacher;

    }

    // SEARCHES

    public function find($id){
        
        try{

            $teacher = Teacher::with('district')->findOrFail($id);
            
            return $teacher;    

        }catch(Exception $e){

            return null;

        }

    }
    

    public function teachers(){

        return Teacher::with('district')->get();

    }
    

    public function find_by_email($email){

         if($teacher = Teacher::where('email', $email)->first()){

            return $teacher;

         }

        return null;

    }

    public function find_by_phone($phone){

        if($teacher = Teacher::where('phone', $phone)->first()){

           return $teacher;

        }

       return null;
    }

    public function dropdown()
    {
        return Teacher::select('id', 'first_name', 'last_name')->get();
    }

    public function dropdownForEnrollment($course_id)
    {
        $course = Course::find($course_id);

        $course_teacher_ids = $course->teachers->pluck('id')->toArray();

        return Teacher::select('id', 'email')->whereNotIn('id', $course_teacher_ids)->get();
    }

    

}