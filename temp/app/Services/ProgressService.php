<?php


namespace App\Services;

use App\Models\Progress;

class ProgressService{

    public function get_progress($courseID, $teacherID){

        $progress = Progress::where('course_id', $courseID)->where('teacher_id', $teacherID)->first();

        return $progress;

    }

    public function update_progress(Progress $progress_instance, $teacher_course_status){

        $progress_instance->current_status = json_encode($teacher_course_status);

        $progress_instance->save();

        return $progress_instance;

    }

    public function create_progress($courseID, $teacherID, $teacher_course_status){

        $progress = new Progress();

        $progress->teacher_id = $teacherID;

        $progress->course_id = $courseID;

        $progress->current_status = json_encode($teacher_course_status);

        $progress->save();

        return $progress;

    }

    

}