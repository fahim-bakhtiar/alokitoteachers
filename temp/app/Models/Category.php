<?php

namespace App\Models;

use App\Models\LessonPlan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type'];

    public function lessonplans_by_subject(){

        return LessonPlan::Where('subject', $this->id)->get();

    }

    public function lessonplans_by_grade(){

        return LessonPlan::Where('class', $this->id)->get();

    }
}
