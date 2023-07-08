<?php

namespace App\Services;


use App\Models\Faculty;
use Illuminate\Support\Str;


class FacultyService
{
    public function index()
    {
        $faculties = Faculty::all();

        return $faculties;
    }

    public function store($request)
    {
        $faculty = Faculty::create($request->only(['first_name','last_name', 'details']));

        if($request->dp){

            $image_data = json_decode($request->dp);

            $imageName = Str::random(10).'.'.'png';
            
            \File::put(storage_path(). '/app/public/images/faculties/' . $imageName, base64_decode($image_data->data));
            
            $faculty->dp = 'public/images/faculties/'.$imageName;

        }else{

            $faculty->dp = 'public/images/'.'female_avatar.png';

        }

        $faculty->save();

        return $faculty;

    }

    public function find($faculty_id)
    {
        return Faculty::findOrFail($faculty_id);
    }

    public function update($request, $faculty_id)
    {
        $faculty = Faculty::findOrFail($faculty_id);

        $faculty->update($request->only(['first_name','last_name', 'details']));

        if($request->dp){

            $image_data = json_decode($request->dp);

            $imageName = Str::random(10).'.'.'png';
            
            \File::put(storage_path(). '/app/public/images/faculties/' . $imageName, base64_decode($image_data->data));
            
            $faculty->dp = 'public/images/faculties/'.$imageName;

        }

        $faculty->save();

        return $faculty;
    }


}