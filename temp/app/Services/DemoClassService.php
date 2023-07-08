<?php

namespace App\Services;

use App\Models\DemoClass;

class DemoClassService
{
    public function index()
    {
        $demo_classes = DemoClass::all();

        return $demo_classes;
    }

    public function store($request)
    {
        DemoClass::create($request->only(['title', 'class', 'subject', 'video_url', 'duration', 'price', 'sale_price']));
    }

    public function find($demo_class_id)
    {
        return DemoClass::findOrFail($demo_class_id);
    }

    public function update($request, $demo_class_id)
    {
        $demo_class = DemoClass::findOrFail($demo_class_id);

        $demo_class->update($request->only(['title', 'class', 'subject', 'video_url', 'duration', 'price', 'sale_price']));
    }

    public function changeStatus($demo_class_id)
    {
        $demo_class = DemoClass::findOrFail($demo_class_id);

        $demo_class->status = $demo_class->status == "active" ? "inactive" : "active";

        $demo_class->save();
    }


}