<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'detail', 'sequence', 'course_id'];

    public function course(){

        return $this->belongsTo(Course::class);

    }

    public function questions(){

        return $this->hasMany(Question::class);

    }

    public function modelName(){

        return 'quiz';

    }
}
