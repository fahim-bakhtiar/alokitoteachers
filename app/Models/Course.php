<?php

namespace App\Models;

use App\Models\Quiz;
use App\Models\Faculty;
use App\Models\Payment;
use App\Models\Teacher;
use App\Models\Progress;
use App\Models\CourseVideo;
use App\Models\Catagorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'details', 'learning_objective', 'price', 'sale_price', 'certificate_price', 'status', 'preview_video', 'thumbnail'];

    public function course_videos(){

        return $this->hasMany(CourseVideo::class);

    }

    public function quizzes(){

        return $this->hasMany(Quiz::class);

    }

    public function faculties(){

        return $this->belongsToMany(Faculty::class)->withPivot('role');

    }

    public function progresses(){

        return $this->hasMany(Progress::class);

    }


    public function total_marks($teacherID){

        $progresses = $this->progresses;

        foreach($progresses as $progress){

            if($progress->teacher_id == $teacherID){

                return $progress->get_total_marks();

            }

        }

        return 0;

    }

    public function get_current_progress($teacherID){

        $progresses = $this->progresses;

        foreach($progresses as $progress){

            if($progress->teacher_id == $teacherID){

                return $progress->get_current_progress();

            }

        }

        return 0;

    }

    public function get_IDarray_of_faculties_by_types(){

        $current_advisors = [];

        $current_designers = [];

        $current_facilitators = [];

        foreach($this->faculties as $faculty){

            if($faculty->pivot->role == 'Course Advisor'){

                array_push($current_advisors, $faculty->id);

            }

            if($faculty->pivot->role == 'Course Designer'){

                array_push($current_designers, $faculty->id);

            }

            if($faculty->pivot->role == 'Course Facilitator'){

                array_push($current_facilitators, $faculty->id);

            }

        }

        return [
            'advisors' => $current_advisors,

            'designers' => $current_designers,

            'facilitators' => $current_facilitators
        ];

    }

    public function advisors(){

        $faculties = $this->faculties;

        $advisors = collect();

        foreach($faculties as $faculty){

            if($faculty->pivot->role == 'Course Advisor'){

                $advisors->push($faculty);

            }

        }

        return $advisors;

    }

    public function designers(){

        $faculties = $this->faculties;

        $designers = collect();

        foreach($faculties as $faculty){

            if($faculty->pivot->role == 'Course Designer'){

                $designers->push($faculty);

            }

        }

        return $designers;

    }

    public function facilitators(){

        $faculties = $this->faculties;

        $facilitators = collect();

        foreach($faculties as $faculty){

            if($faculty->pivot->role == 'Course Facilitator'){

                $facilitators->push($faculty);

            }

        }

        return $facilitators;

    }


    public function categories_array(){

        $catagorizables = Catagorizable::where('model_id', $this->id)->where('model_type', 'Course')->get();
        
        $cats = [];

        foreach($catagorizables as $catagorizable){

            array_push($cats, $catagorizable->category_id);

        }

        return $cats;

    }

    public function getAbsoluteProfileImagePath()
    {
        return asset('public' . Storage::url($this->thumbnail));
    }

    public function no_of_chapters(){

        return count($this->course_videos) + count($this->quizzes);

    }

    public function teachers(){

        return $this->belongsToMany(Teacher::class)->withPivot('current_sequence', 'total_mark', 'completed_at');

    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }
}
