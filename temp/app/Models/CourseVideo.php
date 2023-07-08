<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseVideo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'detail', 'url', 'sequence', 'course_id'];

    public function course(){

        return $this->belongsTo(Course::class);

    }

    public function modelName(){

        return 'video';

    }
}
