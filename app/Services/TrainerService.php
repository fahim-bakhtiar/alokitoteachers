<?php

namespace App\Services;

use Storage;
use App\Models\Trainer;
use Illuminate\Support\Str;

class TrainerService
{
    public function index()
    {
        $trainers = Trainer::all();

        return $trainers;
    }

    public function store($request)
    {
        $trainer = Trainer::create($request->only(['first_name', 'last_name', 'about']));

        if($request->profile_image){

            $image_data = json_decode($request->profile_image);

            $imageName = Str::random(10).'.'.'png';
            
            \File::put(storage_path(). '/app/public/images/workshops/trainers/' . $imageName, base64_decode($image_data->data));
            
            $trainer->profile_image_path = 'public/images/workshops/trainers/'.$imageName;

            $trainer->profile_image_name = $imageName;

        }

        $trainer->save();
    }

    public function find($trainer_id)
    {
        return Trainer::findOrFail($trainer_id);
    }

    public function update($request, $trainer_id)
    {
        $trainer = Trainer::findOrFail($trainer_id);

        $trainer->update($request->only(['first_name', 'last_name', 'about']));

        if($request->profile_image){

            if($trainer->profile_image_path){ Storage::delete($trainer->profile_image_path); }

            $image_data = json_decode($request->profile_image);

            $imageName = Str::random(10).'.'.'png';
            
            \File::put(storage_path(). '/app/public/images/workshops/trainers/' . $imageName, base64_decode($image_data->data));
            
            $trainer->profile_image_path = 'public/images/workshops/trainers/'.$imageName;

            $trainer->profile_image_name = $imageName;

        }

        $trainer->save();
    }

    public function dropdown()
    {
        return Trainer::select('id', 'first_name', 'last_name')->get();
    }


}