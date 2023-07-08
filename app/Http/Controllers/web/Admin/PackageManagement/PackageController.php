<?php

namespace App\Http\Controllers\web\Admin\PackageManagement;

use App\Models\Package;
use App\Services\PackageService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PackageController extends Controller
{

    protected $package_service;

    public function __construct(PackageService $package_service){

        $this->package_service = $package_service;

    }

    public function show_create_form(){

        set_page_name('package-mgt-create');

        return view('admin.dashboard.package-management.create_package');

    }

    public function create(Request $request){

        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'max_course' => 'required|integer',
            'max_resource' => 'required|integer',
            'max_workshop' => 'required|integer',
            'icon' => 'required',
        ]);
        
        $package = $this->package_service->create($request);

        return redirect()->back()->with('success', 'New package is created successfully!');
    }

    public function list(){

        set_page_name('package-mgt-list');

        $packages = $this->package_service->packages();

        foreach($packages as $package){

            $package->edit_link = route('package-management.edit', $package->id);

            if($package->status == 'active'){

                $package->status_change_link = route('package-management.inactivate', $package->id);
            }
            else{
                $package->status_change_link = route('package-management.activate', $package->id);
            }
            

        }

        return view('admin.dashboard.package-management.list_package', compact('packages'));

    }

    public function show_edit_form($id){

        $package = $this->package_service->find($id);

        return view('admin.dashboard.package-management.edit_package', compact('package'));

    }

    public function update(Request $request, $id){

        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'max_course' => 'required|integer',
            'max_resource' => 'required|integer',
            'max_workshop' => 'required|integer',
            'icon' =>  $request->icon != null ? 'image' : '',
        ]);

        $package = $this->package_service->update($id, $request);

        return redirect()->back()->with('success', 'The package is updated successfully!');

    }

    public function activate($id){

        $packages = $this->package_service->activate($id);

        return redirect()->back()->with('success', 'Package is activated successfully!');

    }

    public function inactivate($id){

        $packages = $this->package_service->inactivate($id);

        return redirect()->back()->with('success', 'Package is inactivated successfully!');

    }
    
}
