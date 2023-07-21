<?php

namespace App\Http\Controllers\web\Admin\WorkshopManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\WorkshopService;
use App\Services\TrainerService;

class WorkshopController extends Controller
{
    private $workshop_service;

    private $trainer_service;

    public function __construct(WorkshopService $workshop_service, TrainerService $trainer_service)
    {
        $this->workshop_service = $workshop_service;

        $this->trainer_service = $trainer_service;
    }

    public function index()
    {
        set_page_name('workshop.index');

        $workshops = $this->workshop_service->index();

        foreach($workshops as $workshop){

            $workshop->edit_link = route('workshop-management.workshop.edit', $workshop->id);

            $workshop->batch_create_link = route('workshop-management.batch.create', $workshop->id);
 
            if(count($this->workshop_service->get_batches($workshop->id)) > 0){

                $workshop->batch_list_link = route('workshop-management.batch.list', $workshop->id);
            }
            
            $workshop->thumbnail = $workshop->getAbsoluteThumbnailPath();

            if($workshop->status == 'inactive'){

                $workshop->activation_link = route('workshop-management.workshop.change-status', $workshop->id);
            }
            else{
                $workshop->activation_link = route('workshop-management.workshop.change-status', $workshop->id);
            }
            

        }
        // dd();
        return view('admin.dashboard.workshop-management.workshop.index', compact('workshops'));
    }

    public function create()
    {
        set_page_name('workshop.create');

        $trainers = $this->trainer_service->dropdown();

        return view('admin.dashboard.workshop-management.workshop.create', compact('trainers'));
    }

    public function store(Request $request)
    {   

        $request->validate([
            'name' => 'required | string',
            'description' => 'required | string',
            'price' => 'required | numeric',
            'sale_price' => 'nullable | numeric',
            'preview_video_url' => 'required | string',
            'thumbnail' => 'required',
            'type' => 'required | string',
            'trainers' => 'required | array',
            'duration' => 'required | numeric',
            'total_credit_hours' => 'required | numeric',
            'learning_outcomes' => 'required | string'
        ]);

        $this->workshop_service->store($request);

        return redirect()->back()->with(['success' => 'Workshop Created Successfully !']);
    }
    
    public function edit($workshop_id)
    {
        set_page_name('workshop.index');

        $workshop = $this->workshop_service->find($workshop_id);

        $trainers = $this->trainer_service->dropdown();

        $trainers_in_this_workshop = [];
        
        foreach($workshop->trainers as $trainer){

            array_push($trainers_in_this_workshop, $trainer->id);

        }

        return view('admin.dashboard.workshop-management.workshop.edit', compact('workshop', 'trainers', 'trainers_in_this_workshop'));
    }

    public function update(Request $request, $workshop_id)
    {
        $request->validate([
            'name' => 'required | string',
            'description' => 'required | string',
            'price' => 'required | numeric',
            'sale_price' => 'nullable | numeric',
            'preview_video_url' => 'required | string',
            'type' => 'required | string',
            'trainers' => 'required | array',
            'duration' => 'required | numeric',
            'total_credit_hours' => 'required | numeric',
            'start_date' => 'required',
            'end_date' => 'required',
            'learning_outcomes' => 'required | string'
        ]);

        $this->workshop_service->update($request, $workshop_id);

        return redirect()->route('workshop-management.workshop.edit', $workshop_id)->with(['success' => 'Workshop Updated Successfully !']);
    }

    public function changeStatus($workshop_id)
    {
        $this->workshop_service->changeStatus($workshop_id);

        return redirect()->back()->with(['success' => 'Status Updated Successfully !']);
    }


}
