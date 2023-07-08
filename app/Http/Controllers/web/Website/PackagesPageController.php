<?php

namespace App\Http\Controllers\web\website;

use Illuminate\Http\Request;
use App\Services\PackageService;
use App\Http\Controllers\Controller;

class PackagesPageController extends Controller
{
    protected $package_service;

    public function __construct(PackageService $package_service){

        $this->package_service = $package_service;

    }

    public function deliver_packages(Request $request){

        $packages = $this->package_service->packages();

        $packages = $packages->where('status', 'active');

        return view('website.package.packages', compact('packages'));

    }
}
