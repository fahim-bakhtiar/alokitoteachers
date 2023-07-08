<?php

namespace App\Services;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminService{

    public function create($data){
        
        $admin = new Admin();

        $admin->name = $data->name;

        $admin->email = $data->email;

        $admin->admin_level = 1;

        if($data->image){

            $image_data = json_decode($data->image);

            $imageName = Str::random(10).'.'.'png';
            
            \File::put(storage_path(). '/app/public/images/admins/' . $imageName, base64_decode($image_data->data));
            
            $admin->image = 'public/images/admins/'.$imageName;

        }

        $admin->password = bcrypt($data->password);
        
        $admin->save();

        return $admin;

    }

    public function find($id){
        
        $admin = Admin::findOrFail($id);

        return $admin;

    }

    public function admins(){

        return Admin::where('admin_level', '!=', 0)->get();

    }

    public function find_by_email($email){

         if($admin = Admin::where('email', $email)->first()){

            return $admin;

         }

        return null;

    }

    public function update($id, $data){

        $admin = Admin::findOrFail($id);
        
        $admin->update($data->only('name', 'email'));

        if($data->password){ $admin->password = bcrypt($data->password); }

        if($data->hasFile('image')){
            
            if($admin->image){ Storage::delete('public/images/'.$admin->image); }
            
            $image_name = $data->file('image')->hashName();
            
            $data->file('image')->storeAs('public/images/', $image_name);

            $admin->image = $image_name;

        }

        $admin->save();

        return $admin;

    }

    public function delete($id){

        $admin = Admin::find($id);

        if(!$admin){

            return false;

        }

        $admin->delete();

        return true;

    }

}