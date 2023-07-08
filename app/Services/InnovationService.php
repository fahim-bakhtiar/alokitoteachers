<?php

namespace App\Services;

use App\Models\Innovation;
use Storage;
use Carbon\Carbon;

class InnovationService
{
    public function index($request)
    {
        $innovations = Innovation::query();

        if(!empty($request->start_date))
        {
            $innovations->whereDate('created_at', '>=', Carbon::parse($request->start_date));
        }

        if(!empty($request->end_date))
        {
            $innovations->whereDate('created_at', '<=', Carbon::parse($request->end_date));
        }

        if(!empty($request->teacher_id))
        {
            $innovations->where('teacher_id', '=', $request->teacher_id);
        }

        return $innovations->get();
    }

    public function find($innovation_id)
    {
        return Innovation::findOrFail($innovation_id);
    }

    public function getInnovations($teacher_id)
    {
        $innovations = Innovation::where('teacher_id', '=', $teacher_id)->get();

        return $innovations;
    }

    public function getInnovation($teacher_id, $innovation_id)
    {
        $innovation = Innovation::where('id', '=', $innovation_id)->where('teacher_id', '=', $teacher_id)->first();

        return $innovation;
    }

    public function store($request)
    {
        $innovation = new Innovation();

        $innovation->teacher_id = get_current_teacher()->id;

        $innovation->title = $request->title;

        $innovation->description = $request->description;

        $innovation->price = $request->price;
        dd('hello');
        // THUMBNAIL
        if(!empty($request->file('thumbnail')))
        {
            $file_name = date('YmdHis') . "_" . mt_rand(1, 999999) . "." . $request->file('thumbnail')->getClientOriginalExtension();

            $file_path = $request->file('thumbnail')->storeAs('public/innovation_thumbnails', $file_name);

            $innovation->thumbnail_path = $file_path;

            $innovation->thumbnail_name = $file_name;
        }

        $innovation->save();
    }

    public function update($request, $innovation_id)
    {
        $innovation = $this->getInnovation(get_current_teacher()->id, $innovation_id);

        if($innovation == null)
        {
            return redirect()->back();
        }

        $innovation->title = $request->title;

        $innovation->description = $request->description;

        $innovation->price = $request->price;

        // THUMBNAIL
        if(!empty($request->file('thumbnail')))
        {
            $file_name = date('YmdHis') . "_" . mt_rand(1, 999999) . "." . $request->file('thumbnail')->getClientOriginalExtension();

            $file_path = $request->file('thumbnail')->storeAs('public/innovation_thumbnails', $file_name);

            $old_file_path = $innovation->thumbnail_path;

            $innovation->thumbnail_path = $file_path;

            $innovation->thumbnail_name = $file_name;

            Storage::delete($old_file_path);
        }

        $innovation->save();
    }

    public function updateJuryPoints($request, $innovation_id)
    {
        $innovation = Innovation::findOrFail($innovation_id);

        $innovation->jury_points = $request->jury_points;

        $innovation->save();
    }

    public function changeStatus($innovation_id)
    {
        $innovation = Innovation::findOrFail($innovation_id);

        $innovation->status = $innovation->status == "pending" ? "approved" : "pending";

        $innovation->save();
    }

    
}
