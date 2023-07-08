<?php

namespace App\Services;

use App\Models\Package;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PackageService{

    public function create($data){
        
        $package = Package::create($data->only('title','price','duration', 'max_course','max_resource','max_workshop'));

        if($data->icon){

            $image_data = json_decode($data->icon);

            $imageName = Str::random(10).'.'.'png';
            
            \File::put(storage_path(). '/app/public/images/packages/' . $imageName, base64_decode($image_data->data));
            
            $package->icon = 'public/images/packages/'.$imageName;

        }

        $package->status = 'inactive';
        
        $package->save();

        return $package;

    }

    public function find($id){
        
        $package = Package::findOrFail($id);

        return $package;

    }

    public function packages(){

        return Package::all();

    }

    public function update($id, $data){

        $package = Package::findOrFail($id);
        
        $package->update($data->only('title','price','duration', 'max_course','max_resource','max_workshop'));

        if($data->icon){

            if($package->icon){ Storage::delete($package->icon); }

            $image_data = json_decode($data->icon);

            $imageName = Str::random(10).'.'.'png';
            
            \File::put(storage_path(). '/app/public/images/packages/' . $imageName, base64_decode($image_data->data));
            
            $package->icon = 'public/images/packages/'.$imageName;

        }


        $package->save();

        return $package;

    }

    // Actions

    public function activate($id){
        
        $package = Package::findOrFail($id);

        $package->status = 'active';

        $package->save();

        return $package;

    }

    public function inactivate($id){
        
        $package = Package::findOrFail($id);

        $package->status = 'inactive';

        $package->save();

        return $package;

    }

}