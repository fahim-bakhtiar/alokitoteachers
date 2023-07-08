<?php

namespace App\Models;

use App\Models\Lesson;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LessonPlan extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'status', 'title','class','subject','details', 'duration','date','learning_outcomes'];

    public function subject(){

        return Category::findOrFail($this->subject);

    }

    public function grade_level(){

        return Category::findOrFail($this->class);

    
    }
    public function lessons(){

        return $this->hasMany(Lesson::class);

    }
    
    
}
