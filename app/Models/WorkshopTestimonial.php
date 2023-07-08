<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkshopTestimonial extends Model
{
    use HasFactory;

    protected $table = "workshop_testimonials";

    protected $fillable = ['name', 'profession', 'designation', 'institution', 'comment', 'workshop_id'];
}
