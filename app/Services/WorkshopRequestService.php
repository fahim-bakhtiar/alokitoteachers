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

    public function store($request)
    {
        $workshop_request = new WorkshopRequest();

        $workshop_request->name = $request->name;
        $workshop_request->email = $request->email;
        $workshop_request->phone = $request->phone;
        $workshop_request->organization = $request->organization;
        $workshop_request->request_details = $request->request_details;

        $workshop_request->save();
    }


}