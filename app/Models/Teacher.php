<?php

namespace App\Models;

use Storage;
use App\Models\Course;
use App\Models\Payment;
use App\Models\District;
use App\Models\Progress;
use App\Models\Subscription;
use App\Models\Catagorizable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['first_name','last_name','email', 'phone','gender','username', 'school', 'school_address','experience', 'gender', 'full_address', 'qualifications', 'work_history', 'sub_id', 'district_id'];

    // Relations

    public function district(){

        return $this->belongsTo(District::class);

    }

    public function courses(){

        return $this->belongsToMany(Course::class)->withPivot('current_sequence', 'total_mark', 'completed_at');

    }

    public function payments(){

        return $this->hasMany(Payment::class);

    }

    public function progresses(){

        return $this->hasMany(Progress::class);

    }

    //Internal Useful Methods

    public function fullname(){

        if($this->first_name && $this->last_name){

            return $this->first_name .' '. $this->last_name;

        }

        return $this->first_name;
        
        
    }


    public function check_for_null_and_get_district_id(){

        if(isset($this->district)){

            return $this->district->id;

        }

        return null;

    }

    public function check_for_null_and_get_school_district_id(){

        if(isset($this->school_district_id)){

            return $this->school_district_id;

        }

        return null;

    }


    public function innovations(){

        return $this->hasMany(Innovation::class);
    }

    public function subscriptions(){

        return $this->hasMany(Subscription::class);

    }

    //Additional Functions

    public function getAbsoluteProfileImagePath()
    {
        return asset('public' . Storage::url($this->dp_path));
    }

    public function current_subscription(){

        if($this->sub_id == 0){

            return get_empty_subscription();

        }

        $subscription = Subscription::with('package')->where('id', $this->sub_id)->first();

        return $subscription;

    }

    public function current_package(){

        if($this->sub_id == 0){

            return get_empty_package();

        }

        $subscription = Subscription::with('package')->where('id', $this->sub_id)->first();
        
        return $subscription->package;

    }

    //nedd to retrun exact category collection
    public function grades(){

        $catagorizables = Catagorizable::where('model_id', $this->id)->where('model_type', 'Teacher')->where('category_type', 'Grade')->get();

        return $catagorizables;

    }

    public function grades_array(){

        $catagorizables = Catagorizable::where('model_id', $this->id)->where('model_type', 'Teacher')->where('category_type', 'Grade')->get();
        
        $grades = [];

        foreach($catagorizables as $catagorizable){

            array_push($grades, $catagorizable->category_id);

        }

        return $grades;

    }

    //need to retrun exact category model
    public function curriculum(){

        $catagorizable = Catagorizable::where('model_id', $this->id)->where('model_type', 'Teacher')->where('category_type', 'Medium')->first();
        
        if($catagorizable){

            return $catagorizable;
        }

        return get_empty_catagorizable();

    }

    public function curriculum_array(){

        $catagorizables = Catagorizable::where('model_id', $this->id)->where('model_type', 'Teacher')->where('category_type', 'Medium')->get();
        
        $mediums = [];
        
        if($catagorizables){

            foreach($catagorizables as $catagorizable){

                array_push($mediums, $catagorizable->category_id);
    
            }

            
        }

        return $mediums;

    }

    

    
}
