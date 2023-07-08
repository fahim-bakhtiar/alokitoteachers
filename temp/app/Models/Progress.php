<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Progress extends Model
{
    use HasFactory;

    public function teacher(){

        return $this->belongsTo(Teacher::class);

    }

    public function course(){

        return $this->belongsTo(Course::class);

    }


    public function get_current_sequence(){

        return json_decode($this->current_status)->current_sequence;

    }

    public function get_next_sequence(){

        return json_decode($this->current_status)->next_sequence;

    }

    public function get_total_marks(){

        return json_decode($this->current_status)->total_mark;

    }

    public function get_current_progress(){

        return json_decode($this->current_status)->progress;

    }

    public function get_is_enrolled(){

        return json_decode($this->current_status)->enrolled;

    }

    public function get_current_overall_status(){
        
        return json_decode($this->current_status);

    }
}
