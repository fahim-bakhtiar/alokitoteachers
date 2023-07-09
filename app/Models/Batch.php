<?php

namespace App\Models;

use App\Models\Trainer;
use App\Models\Workshop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Batch extends Model
{
    use HasFactory;

    public function trainers()
    {
        return $this->belongsToMany(Trainer::class, 'workshop_trainers', 'workshop_id', 'trainer_id');
    }

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }
}
