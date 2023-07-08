<?php

namespace App\Http\Controllers\web\Admin\WorkshopManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\WorkshopService;
use App\Services\WorkshopTestimonialService;

class WorkshopTestimonialController extends Controller
{
    private $workshop_service;

    private $workshop_testimonial_service;

    public function __construct(WorkshopService $workshop_service, WorkshopTestimonialService $workshop_testimonial_service)
    {
        $this->workshop_service = $workshop_service;
        
        $this->workshop_testimonial_service = $workshop_testimonial_service;

        set_page_name('workshop.index');
    }

    public function index($workshop_id)
    {
        $workshop = $this->workshop_service->find($workshop_id);

        return view('admin.dashboard.workshop-management.workshop-testimonial.index', compact('workshop'));
    }

    public function create($workshop_id)
    {
        $workshop = $this->workshop_service->find($workshop_id);

        return view('admin.dashboard.workshop-management.workshop-testimonial.create', compact('workshop'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string',
            'profession' => 'required | string',
            'designation' => 'nullable | string',
            'institution' => 'nullable | string',
            'comment' => 'required | string',
            'workshop_id' => 'required | numeric'
        ]);

        $this->workshop_testimonial_service->store($request);

        return redirect()->back()->with(['success' => 'Testimonial Added Successfully !']);
    }
    
    public function edit($workshop_testimonial_id)
    {
        $workshop_testimonial = $this->workshop_testimonial_service->find($workshop_testimonial_id);

        return view('admin.dashboard.workshop-management.workshop-testimonial.edit', compact('workshop_testimonial'));
    }

    public function update(Request $request, $workshop_testimonial_id)
    {
        $request->validate([
            'name' => 'required | string',
            'profession' => 'required | string',
            'designation' => 'nullable | string',
            'institution' => 'nullable | string',
            'comment' => 'required | string'
        ]);

        $workshop_testimonial = $this->workshop_testimonial_service->update($request, $workshop_testimonial_id);

        return redirect()->route('workshop-management.workshop-testimonial.index', $workshop_testimonial->workshop_id)->with(['success' => 'Testimonial Updated Successfully !']);
    }


}
