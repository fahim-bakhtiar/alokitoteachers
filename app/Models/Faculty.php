<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = ['first_name','last_name', 'details'];

    public function courses(){

        return $this->belongsToMany(Course::class)->withPivot('role');

    }

    public function getAbsoluteProfileImagePath()
    {
        return asset('public' . Storage::url($this->dp));
    }

    public function fullname(){

        if($this->first_name && $this->last_name){

            return $this->first_name .' '. $this->last_name;

        }

        return $this->first_name;
        
        
    }
}
