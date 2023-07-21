<?php

namespace App\Services;

use Storage;
use Carbon\Carbon;
use App\Models\Batch;
use App\Models\Teacher;
use App\Models\Workshop;
use App\Models\WorkshopTeacher;
use Illuminate\Support\Str;

class WorkshopService
{
    public function index()
    {
        $workshops = Workshop::all();

        return $workshops;
    }

    public function store($request)
    {
        $workshop = Workshop::create($request->only(['name', 'description', 'price', 'sale_price', 'preview_video_url', 'type', 'duration', 'total_credit_hours', 'learning_outcomes']));


        if($request->thumbnail){

            $image_data = json_decode($request->thumbnail);

            $imageName = Str::random(10).'.'.'png';
            
            \File::put(storage_path(). '/app/public/images/workshops/' . $imageName, base64_decode($image_data->data));
            
            $workshop->thumbnail_path = 'public/images/workshops/'.$imageName;

            $workshop->thumbnail_name = $imageName;

        }

        $workshop->save();

        $workshop->trainers()->sync($request->trainers);
    }

    public function find($workshop_id)
    {
        return Workshop::findOrFail($workshop_id);
    }

    public function update($request, $workshop_id)
    {
        $workshop = Workshop::findOrFail($workshop_id);

        $workshop->update($request->only(['name', 'description', 'price', 'sale_price', 'preview_video_url', 'type', 'duration', 'total_credit_hours', 'learning_outcomes']));

        $workshop->start_date = Carbon::parse($request->start_date);

        $workshop->end_date = Carbon::parse($request->end_date);

        if($request->thumbnail){

            if($workshop->thumbnail_path){ Storage::delete($workshop->thumbnail_path); }

            $image_data = json_decode($request->thumbnail);

            $imageName = Str::random(10).'.'.'png';
            
            \File::put(storage_path(). '/app/public/images/workshops/' . $imageName, base64_decode($image_data->data));
            
            $workshop->thumbnail_path = 'public/images/workshops/'.$imageName;

            $workshop->thumbnail_name = $imageName;

        }

        $workshop->save();

        $workshop->trainers()->sync($request->trainers);
    }

    public function changeStatus($workshop_id)
    {
        $workshop = Workshop::findOrFail($workshop_id);

        $workshop->status = $workshop->status == "active" ? "inactive" : "active";

        $workshop->save();
    }

    //BATCHES

    public function store_batch($data){

        $batch = new Batch();

        $batch->name = $data->name; 

        $batch->limit = $data->limit;

        $batch->workshop_id = $data->workshop_id;

        $batch->start_date = Carbon::parse($data->start_date);

        $batch->end_date = Carbon::parse($data->end_date);

        $batch->save();

        return $batch;

    }

    public function get_batches($workshop_id){

        $batches = Batch::with('workshop')->where('workshop_id', $workshop_id)->get();
        
        return $batches;

    }

    public function find_batch($batch_id){

        $batch = Batch::with('workshop')->find($batch_id);

        return $batch;

    }

    public function update_batch($data){

        $batch = Batch::with('workshop')->find($data->batch_id);

        $batch->name = $data->name; 

        $batch->limit = $data->limit;

        $batch->start_date = Carbon::parse($data->start_date);

        $batch->end_date = Carbon::parse($data->end_date);

        $batch->save();

        return $batch;

    }

    public function teachersUnderABatch($batch_id)
    {
        $teachers = WorkshopTeacher::join('teachers as t', 't.id', '=', 'workshop_teachers.teacher_id')
        ->select(

            't.id',
            't.first_name as name',
            't.email',
            't.phone',
            'workshop_teachers.assignment',
            'workshop_teachers.participation',
            'workshop_teachers.attendence',
            'workshop_teachers.id as workshop_teacher_id'

        )
        ->where('workshop_teachers.batch_id', '=', $batch_id)
        ->orderBy('t.id')
        ->get();

        return $teachers;
    }

    public function getTeacherByWorkshopTeacherID($workshop_teacher_id)
    {
        $workshop_teacher = WorkshopTeacher::find($workshop_teacher_id);

        $teacher = Teacher::find($workshop_teacher->teacher_id);

        return $teacher;
    }

    public function getWorkshopTeacher($workshop_teacher_id)
    {
        $workshop_teacher = WorkshopTeacher::find($workshop_teacher_id);

        return $workshop_teacher;
    }

    public function givePointsStore($request, $workshop_teacher_id)
    {
        $workshop_teacher = WorkshopTeacher::find($workshop_teacher_id);

        $workshop_teacher->assignment = $request->assignment;
        $workshop_teacher->participation = $request->participation;
        $workshop_teacher->attendence = $request->attendance;

        $workshop_teacher->save();
    }


}