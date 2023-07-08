<?php

namespace App\Services;

use Storage;
use Carbon\Carbon;
use App\Models\Workshop;
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

        $workshop->start_date = Carbon::parse($request->start_date);

        $workshop->end_date = Carbon::parse($request->end_date);


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


}