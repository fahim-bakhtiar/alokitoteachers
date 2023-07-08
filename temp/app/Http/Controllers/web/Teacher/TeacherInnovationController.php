<?php

namespace App\Http\Controllers\web\Teacher;

use Illuminate\Http\Request;
use App\Services\InnovationService;
use App\Http\Controllers\Controller;

class TeacherInnovationController extends Controller
{
    protected $innovation_service;

    public function __construct(InnovationService $innovation_service){

        $this->innovation_service = $innovation_service;

    }

    public function create_innovation(){

        return view('teacher.create-innovation');

    }

    public function store_innovation(Request $request)
    {
        $request->validate([
            'title' => 'required | string',
            'description' => 'required | string',
            'price' => 'required | numeric',
            'thumbnail' => 'required | image | max:2048'
        ]);

        $this->innovation_service->store($request);

        return redirect()->back()->with(['success' => 'Innovation Created Successfully !']);
    }

    public function edit_innovation($innovation_id)
    {
        $innovation = $this->innovation_service->getInnovation(get_current_teacher()->id, $innovation_id);
        
        if($innovation == null)
        {
            return redirect()->back();
        }

        return view('teacher.edit-innovation', compact('innovation'));
    }

    public function update_innovation(Request $request, $innovation_id)
    {
        $request->validate([
            'title' => 'required | string',
            'description' => 'required | string',
            'price' => 'required | numeric',
            'thumbnail' => 'image | max:2048'
        ]);

        $this->innovation_service->update($request, $innovation_id);

        return redirect()->back()->with(['success' => 'Innovation Updated Successfully !']);
    }


}
