<?php

namespace App\Http\Controllers\web\Admin\UserManagement;

use Illuminate\Http\Request;
use App\Services\AdminService;
use App\Http\Controllers\Controller;

class AdminCrudController extends Controller
{

    protected $admin_service;

    public function __construct(AdminService $admin_service){

        set_page_name('admin-mgt');

        $this->admin_service = $admin_service;

    }

    public function admins(){

        $admins = $this->admin_service->admins();

        foreach($admins as $admin){

            $admin->edit_link = route('admin.user-management.edit', $admin->id);

            if($admin->active == 1){

                $admin->status_change_link = route('admin.user-management.revoke', $admin->id);
            }
            else{
                $admin->status_change_link = route('admin.user-management.regain', $admin->id);
            }
            

        }
        // return $admins;
        return view('admin.dashboard.user-management.admin.list_admin', compact('admins'));

    }

    public function show_create_form(){

        return view('admin.dashboard.user-management.admin.create_admin');

    }

    public function create(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'email|unique:admins',
            'password' => 'required|min:8|confirmed',
        ]);

        $admin = $this->admin_service->create($request);

        return redirect()->back()->with('success', 'New admin user is created successfully!');
    }

    public function show_edit_form($id){
        
        $admin = $this->admin_service->find($id);

        return view('admin.dashboard.user-management.admin.edit_admin', compact('admin'));

    }

    public function update_admin(Request $request, $id){

        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
        ]);

        $admin = $this->admin_service->update($id, $request);

        return redirect()->back()->with('success', 'Admin user is updated successfully!');

    }

    public function revoke_access($id){

        $admin = $this->admin_service->find($id);

        $admin->active = 0;

        $admin->save();

        return redirect()->back()->with('success', 'Admin user access is revoked!');


    }

    public function regain_access($id){

        $admin = $this->admin_service->find($id);

        $admin->active = 1;

        $admin->save();

        return redirect()->back()->with('success', 'Admin user access is regained!');


    }

}
