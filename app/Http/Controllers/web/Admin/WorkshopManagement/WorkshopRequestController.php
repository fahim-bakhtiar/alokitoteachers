<?php

namespace App\Http\Controllers\web\Admin\WorkshopManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\WorkshopRequestService;

class WorkshopRequestController extends Controller
{
    private $workshop_request_service;

    public function __construct(WorkshopRequestService $workshop_request_service)
    {
        $this->workshop_request_service = $workshop_request_service;
    }

    public function index()
    {
        $workshop_requests = $this->workshop_request_service->index();

        return view('admin.dashboard.workshop-management.workshop-request.index', compact('workshop_requests'));
    }


}
