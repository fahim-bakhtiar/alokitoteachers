<?php

namespace App\Http\Controllers\web\Admin\InnovationManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\InnovationService;
use App\Services\TeacherService;

class InnovationController extends Controller
{
    private $innovation_service;

    private $teacher_service;

    public function __construct(InnovationService $innovation_service, TeacherService $teacher_service)
    {
        $this->innovation_service = $innovation_service;

        $this->teacher_service = $teacher_service;
    }

    public function index(Request $request)
    {
        set_page_name('innovation.index');

        $innovations = $this->innovation_service->index($request);

        $teachers = $this->teacher_service->dropdown();

        return view('admin.dashboard.innovation-management.innovation.index', compact('innovations', 'teachers', 'request'));
    }

    public function show($innovation_id)
    {
        set_page_name('innovation.show');

        $innovation = $this->innovation_service->find($innovation_id);

        return view('admin.dashboard.innovation-management.innovation.show', compact('innovation'));
    }

    public function updateJuryPoints(Request $request, $innovation_id)
    {
        $request->validate([
            'jury_points' => 'numeric | min:0'
        ]);

        $this->innovation_service->updateJuryPoints($request, $innovation_id);

        return redirect()->back()->with(['success' => 'Jury Points Updated Successfully !']);
    }

    public function changeStatus($innovation_id)
    {
        $this->innovation_service->changeStatus($innovation_id);

        return redirect()->back()->with(['success' => 'Status Updated Successfully !']);
    }


}
