<?php

namespace App\Http\Controllers\web\website;

use Illuminate\Http\Request;
use App\Services\InnovationService;
use App\Http\Controllers\Controller;

class InnovationPageController extends Controller
{

    protected $innovation_service;

    public function __construct(InnovationService $innovation_service){

        $this->innovation_service = $innovation_service;

    }

    public function deliver_innovations(){

        return view('website.innovations.innovations');

    }
}
