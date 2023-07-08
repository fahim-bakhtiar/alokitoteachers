<?php

namespace App\Models;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question','sequence', 'option_1', 'option_2', 'option_3', 'option_4', 'points', 'answer', 'quiz_id'];

    public function quiz(){

        return $this->belongsTo(Quiz::class);

    }
}
