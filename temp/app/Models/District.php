<?php

namespace App\Models;

use App\Models\Division;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;

    public function division(){

        return $this->belongsTo(Division::class);

    }

    public function teachers(){

        return $this->hasMany(Teacher::class);

    }
}
