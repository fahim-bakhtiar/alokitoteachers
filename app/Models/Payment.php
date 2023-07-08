<?php

namespace App\Models;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    public function paymentable()
    {
        return $this->morphTo();
    }

    public function teacher(){

        return $this->belongsTo(Teacher::class);

    }
}
