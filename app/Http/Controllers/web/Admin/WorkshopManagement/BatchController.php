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
        
        foreach($batches as $batch)
        {
            $batch->edit_link = route('workshop-management.batch.edit', $batch->id);
            $batch->start_date = date('d M, Y', strtotime($batch->start_date));
            $batch->end_date = date('d M, Y', strtotime($batch->end_date));
            $batch->show_teachers_link = route('workshop-management.batch.show-teachers', $batch->id);
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

    public function showTeachers($batch_id)
    {
        $teachers = $this->workshop_service->teachersUnderABatch($batch_id);

        foreach($teachers as $teacher)
        {
            $teacher->give_points_link = route('workshop-management.batch.give-points-view', $teacher->workshop_teacher_id);
        }

        $batch = $this->workshop_service->find_batch($batch_id);

        return view('admin.dashboard.workshop-management.workshop.batch.show-teachers', compact('teachers', 'batch'));
    }

    public function givePointsView($workshop_teacher_id)
    {
        $teacher = $this->workshop_service->getTeacherByWorkshopTeacherID($workshop_teacher_id);

        $workshop_teacher = $this->workshop_service->getWorkshopTeacher($workshop_teacher_id);
        
        return view('admin.dashboard.workshop-management.workshop.batch.give-points', compact('workshop_teacher', 'teacher'));
    }

    public function givePointsStore(Request $request, $workshop_teacher_id)
    {
        $request->validate([
            'assignment' => 'required | numeric',
            'participation' => 'required | numeric',
            'attendance' => 'required | numeric'
        ]);

        $this->workshop_service->givePointsStore($request, $workshop_teacher_id);

        return redirect()->route('workshop-management.batch.give-points-view', $workshop_teacher_id)->with(['success' => 'Points Given Successfully !']);
    }


}
