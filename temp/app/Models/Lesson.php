<?php

namespace App\Models;

use App\Models\LessonPlan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['duration','segment','activity', 'method','tools','reflection', 'lessonplan_id', 'sequence'];

    public function lessonplan(){

        return $this->belongsTo(LessonPlan::class);

    }

}
