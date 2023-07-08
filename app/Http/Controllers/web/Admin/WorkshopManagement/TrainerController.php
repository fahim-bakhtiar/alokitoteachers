<?php

namespace App\Http\Controllers\web\Admin\WorkshopManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TrainerService;

class TrainerController extends Controller
{
    private $trainer_service;

    public function __construct(TrainerService $trainer_service)
    {
        $this->trainer_service = $trainer_service;
    }

    public function index()
    {
        set_page_name('trainer.index');

        $trainers = $this->trainer_service->index();

        foreach($trainers as $trainer){

            $trainer->edit_link = route('workshop-management.trainer.edit', $trainer->id);

            $trainer->thumbnail = $trainer->getAbsoluteProfileImagePath();

        }

        return view('admin.dashboard.workshop-management.trainer.index', compact('trainers'));
    }

    public function create()
    {
        set_page_name('trainer.create');

        return view('admin.dashboard.workshop-management.trainer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required | string',
            'last_name' => 'required | string',
            'profile_image' => 'required',
            'about' => 'required | string'
        ]);

        $this->trainer_service->store($request);

        return redirect()->back()->with(['success' => 'Trainer Created Successfully !']);
    }

    public function edit($trainer_id)
    {
        set_page_name('trainer.index');

        $trainer = $this->trainer_service->find($trainer_id);

        return view('admin.dashboard.workshop-management.trainer.edit', compact('trainer'));
    }

    public function update(Request $request, $trainer_id)
    {
        $request->validate([
            'first_name' => 'required | string',
            'last_name' => 'required | string',
            'about' => 'required | string'
        ]);

        $this->trainer_service->update($request, $trainer_id);

        return redirect()->route('workshop-management.trainer.index')->with(['success' => 'Trainer Updated Successfully !']);
    }


}
