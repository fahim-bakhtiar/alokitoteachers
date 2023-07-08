<?php

namespace App\Models;

use App\Models\Package;
use App\Models\Payment;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;

    public function package()
    {
        return $this->belongsTo(Package::class)->withDefault([
            'id' => 0,
        ]);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }

}
