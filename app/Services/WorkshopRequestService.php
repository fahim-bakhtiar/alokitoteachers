<?php

namespace App\Services;
use App\Models\WorkshopRequest;

class WorkshopRequestService
{
    public function index()
    {
        $workshop_requests = WorkshopRequest::all();

        return $workshop_requests;
    }


}