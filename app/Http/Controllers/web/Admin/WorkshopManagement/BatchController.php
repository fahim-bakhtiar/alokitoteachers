<?php

namespace App\Http\Controllers\web\Admin\WorkshopManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\WorkshopService;
use App\Services\TrainerService;

class BatchController extends Controller
{
    private $workshop_service;

    private $trainer_service;

    public function __construct(WorkshopService $workshop_service, TrainerService $trainer_service)
    {
        $this->workshop_service = $workshop_service;

        $this->trainer_service = $trainer_service;
    }

    public function index(Request $request)
    {

        $batches = $this->workshop_service->get_batches($request->workshop_id);

        foreach($batches as $batch){

            $batch->edit_link = route('workshop-management.batch.edit', $batch->id);            
            $batch->start_date = date('d M, Y', strtotime($batch->start_date));            
            $batch->end_date = date('d M, Y', strtotime($batch->end_date));            

        }

        return view('admin.dashboard.workshop-management.workshop.batch.index', compact('batches'));
    }

    public function create(Request $request)
    {
        $workshop = $this->workshop_service->find($request->workshop_id);

        $trainers = $this->trainer_service->dropdown();

        return view('admin.dashboard.workshop-management.workshop.batch.create', compact('trainers', 'workshop'));
    }

    public function store(Request $request)
    {   

        $request->validate([
            'name' => 'required | string',
            'limit' => 'required | numeric',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $batch = $this->workshop_service->store_batch($request);

        return redirect()->back()->with(['success' => 'Batch Created Successfully !']);
    }
    
    public function edit($batch_id)
    {   

        $batch = $this->workshop_service->find_batch($batch_id);

        return view('admin.dashboard.workshop-management.workshop.batch.edit', compact('batch'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required | string',
            'limit' => 'required | numeric',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $batch = $this->workshop_service->update_batch($request);

        return redirect()->route('workshop-management.batch.edit', $batch->id)->with(['success' => 'Workshop Updated Successfully !']);
    }

    public function changeStatus($workshop_id)
    {
        $this->workshop_service->changeStatus($workshop_id);

        return redirect()->back()->with(['success' => 'Status Updated Successfully !']);
    }


}
