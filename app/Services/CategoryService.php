<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Teacher;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CategoryService{

    public function create($data){

        $category = Category::create($data->only('name', 'type'));

        return $category;

    }

    public function update($id, $data){

        $category = Category::findOrFail($id);
        
        $category->update($data->only('name','type'));

        $category->save();

        return $category;

    }

    // SEARCHES

    public function find($id){
        
        $category = Category::findOrFail($id);

        return $category;

    }
    

    public function categories(){

        return Category::all();

    }
    

    public function subjects(){

         return Category::where('type', 'subject')->get();

    }

    public function grades(){

        return Category::where('type', 'grade_level')->get();

   }

    

}