<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Quiz;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Category;
use App\Models\Question;
use App\Models\CourseVideo;
use Illuminate\Support\Str;
use App\Models\Catagorizable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CourseService{

    public function create($data){
        
        $course = Course::create($data->only('title', 'details', 'learning_objective', 'price', 'sale_price', 'certificate_price', 'status', 'preview_video'));


        if($data->thumbnail){

            $image_data = json_decode($data->thumbnail);

            $imageName = Str::random(10).'.'.'png';
            
            \File::put(storage_path(). '/app/public/images/courses/' . $imageName, base64_decode($image_data->data));
            
            $course->thumbnail = 'public/images/courses/'.$imageName;

        }

        if($data->categories){
            
            foreach($data->categories as $category){
                
                $catagorizable = new Catagorizable();

                $catagorizable->category_id = json_decode($category)->id;

                $catagorizable->model_type = 'Course';

                $catagorizable->category_type = ucfirst(json_decode($category)->type);

                $catagorizable->model_id = $course->id;

                $catagorizable->save();

            }

        }

        if($data->advisors){
                
            $course->faculties()->attach($data->advisors, ['role' => 'Course Advisor']);

        }
        if($data->designers){
                
            $course->faculties()->attach($data->designers, ['role' => 'Course Designer']);

        }
        if($data->facilitators){
                
            $course->faculties()->attach($data->facilitators, ['role' => 'Course Facilitator']);

        }
        
        $course->save();

        return $course;

    }

    public function update($id, $data){

        $course = Course::findOrFail($id);
        
        $course->update($data->only('title', 'details', 'learning_objective', 'price', 'sale_price', 'certificate_price', 'preview_video'));

        if($data->thumbnail){

            if($course->thumbnail){ Storage::delete($course->thumbnail); }

            $image_data = json_decode($data->thumbnail);

            $imageName = Str::random(10).'.'.'png';
            
            \File::put(storage_path(). '/app/public/images/courses/' . $imageName, base64_decode($image_data->data));
            
            $course->thumbnail = 'public/images/courses/'.$imageName;

        }


        if($data->categories){

            $existing_course_categories = $course->categories_array();
            
            foreach($data->categories as $category){

                $cat = json_decode($category);

                if(!in_array($cat->id, $existing_course_categories)){
                    
                    $catagorizable = new Catagorizable();

                    $catagorizable->category_id = $cat->id;
    
                    $catagorizable->model_type = 'Course';
    
                    $catagorizable->category_type = ucfirst($cat->type);
    
                    $catagorizable->model_id = $course->id;
    
                    $catagorizable->save();

                }

            }

            $requested_categories = [];

            foreach($data->categories as $category){

                array_push($requested_categories, json_decode($category)->id);

            }

            foreach($existing_course_categories as $existing_category_id){
                
                if(!in_array($existing_category_id, $requested_categories)){

                    Catagorizable::where('category_id', $existing_category_id)->where('model_id', $course->id)->where('model_type', 'Course')->delete();

                }

            }

        }


        $course->faculties()->detach();
        
        if($data->advisors){
            
            $course->faculties()->attach($data->advisors, ['role' => 'Course Advisor']);

        }
        if($data->designers){
                
            $course->faculties()->attach($data->designers, ['role' => 'Course Designer']);

        }
        if($data->facilitators){
                
            $course->faculties()->attach($data->facilitators, ['role' => 'Course Facilitator']);

        }


        
        $course->save();

        return $course;

    }


    public function is_qualified_for_activation($id){

        $course = $this->find($id);

        $videos = $course->course_videos;

        $quizzes = $course->quizzes;

        if(sizeof($videos->toArray()) == 0){
            
            return ['message' => "No videos found in this course, You can not activate a course without any videos", 'type' => 'error'];

        }

        

        if(sizeof($quizzes->toArray()) == 0){
            
            return ['message' => "No Quiz found in this course, You can not activate a course without any Quiz in it", 'type' => 'error'];

        }
        
        
        foreach($quizzes as $quiz){

            $questions = $quiz->questions;

            if(sizeof($questions->toArray()) == 0){

                return ['message' => "No Question found in QUIZ: " . $quiz->title . " You can not activate a course with no questions in a quiz", 'type' => 'error'];

            }

        }

        $course->status = 'active';

        $course->save();

        return ['message' => "Activated", 'type' => 'success'];

    }

    // SEARCHES

    public function find($id){
        
        $course = Course::with('course_videos', 'quizzes')->findOrFail($id);

        return $course;

    }
    

    public function courses(){

        return Course::with('quizzes', 'course_videos')->get();

    }


    public function active_courses(){

        return Course::with('quizzes', 'course_videos')->where('status', 'active')->get();

    }
    


    // VIDEOS-----------------------------------------------------------------------------

    public function add_video($data){

        $sequence_occupied = in_array($data->sequence, $this->sequence_numbers($data->course_id));
       
        if($sequence_occupied){

            $video = null;

            return $video;

        }

        $video = CourseVideo::create($data->only('title', 'detail', 'url', 'sequence', 'course_id'));

        return $video;

    }

    public function update_video($id, $data){   
        
        $video = CourseVideo::with('course')->findOrFail($id);
        
        if($video->sequence != $data->sequence){

            $sequence_occupied = in_array($data->sequence, $this->sequence_numbers($data->course_id));
        
            if($sequence_occupied){

                $video = null;

                return $video;

            }

        }

        $video = $video->update($data->only('title', 'detail', 'url', 'sequence', 'course_id'));

        return $video;

    }

    public function find_video($id){

        return CourseVideo::with('course')->findOrFail($id);

    }

    // QUIZZES---------------------------------------------------------

    public function add_quiz($data){

        $sequence_occupied = in_array($data->sequence, $this->sequence_numbers($data->course_id));
        
        if($sequence_occupied){

            $quiz = null;

            return $quiz;

        }

        $quiz = Quiz::create($data->only('title', 'detail', 'sequence', 'course_id'));

        return $quiz;

    }

    public function update_quiz($id, $data){

        $quiz = Quiz::with('course')->findOrFail($id);

        if($quiz->sequence != $data->sequence){

            $sequence_occupied = in_array($data->sequence, $this->sequence_numbers($data->course_id));
        
            if($sequence_occupied){

                $quiz = null;

                return $quiz;

            }

        }

        $quiz = $quiz->update($data->only('title', 'detail','sequence', 'course_id'));

        return $quiz;

    }

    public function find_quiz($id){

        return Quiz::with('course', 'questions')->findOrFail($id);

    }

    //Questions--------------------------------------------------------

    public function add_question($data){

        $sequence_numbers = [];

        $questions = Question::where('quiz_id',$data->quiz_id)->get();

        foreach($questions as $question){

            array_push($sequence_numbers, $question->sequence);

        }

        if(in_array($data->sequence, $sequence_numbers)){

            $question = null;

            return $question;

        }

        $question = Question::create($data->only('question', 'sequence', 'points','answer','option_1','option_2','option_3','option_4', 'quiz_id'));

        return $question;

    }

    public function question_latest_sequence($quiz_id){

        $sequence_numbers = [];

        $questions = Question::where('quiz_id',$quiz_id)->get();

        foreach($questions as $question){

            array_push($sequence_numbers, $question->sequence);

        }
        if(empty($sequence_numbers)){

            return 0;

        }
        
        return max($sequence_numbers);

    }

    public function update_question($id, $data){

        $sequence_numbers = [];

        $questions = Question::where('quiz_id',$data->quiz_id)->get();

        foreach($questions as $question){

            array_push($sequence_numbers, $question->sequence);

        }

        $question = Question::with('quiz')->findOrFail($id);

        if($question->sequence != $data->sequence){

            if(in_array($data->sequence, $sequence_numbers)){

                $question = null;

                return $question;

            }

        }

        $question->update($data->only('question', 'sequence', 'points','answer','option_1','option_2','option_3','option_4', 'quiz_id'));

        return $question;

    }

    public function find_question($id){

        return Question::with('quiz')->findOrFail($id);

    }

    //Secondary Functions----------------------------------------------

    public function sequence_numbers($id){

        $sequences = [];

        $video_sequences = CourseVideo::select('sequence')->where('course_id', $id)->get();

        foreach($video_sequences as $item){

            array_push($sequences, $item->sequence);

        }

        $quiz_sequences = Quiz::select('sequence')->where('course_id', $id)->get();

        foreach($quiz_sequences as $item){

            array_push($sequences, $item->sequence);

        }

        return $sequences;

    }

    public function course_sequence_numbers_latest($id){

        $sequence = $this->sequence_numbers($id);

        if(empty($sequence)){

            return 0;

        }

        return max($sequence);

    }

    public function sequence_list($id){

        $list = collect();

        $videos = CourseVideo::where('course_id', $id)->get();

        $quizzes = Quiz::with('questions')->where('course_id', $id)->get();

        foreach ($videos as $item) {
            
            $list->push($item);

        }

        foreach ($quizzes as $item) {
            
            $list->push($item);

        }
        
        $list = $list->sortBy('sequence');

        $final_list = [];

        foreach($list as $item){

            array_push($final_list, $item);
            

        }
       
        if(count($final_list) > 0){

            $final_list = array_combine(range(1, count($final_list)), array_values($final_list));
            
        }
       

       return $final_list;

    }
    
    public function set_sequence($data){

        $sequence_occupied = in_array($data->sequence, $this->sequence_numbers($data->course_id));

        $result = null;

        if($sequence_occupied){

            return $result;

        }

        if($data->item_type == 'quiz'){

            $result = Quiz::find($data->item_id);

            $result->sequence = $data->sequence;

            $result->save();

        }

        if($data->item_type == 'video'){

            $result = CourseVideo::find($data->item_id);

            $result->sequence = $data->sequence;

            $result->save();

        }

        return $result;

    }



    

}