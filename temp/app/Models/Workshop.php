<?php

namespace App\Models;

use Storage;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Workshop extends Model
{
    use HasFactory;

    protected $table = "workshops";

    protected $fillable = ['name', 'description', 'price', 'sale_price', 'preview_video_url', 'type', 'duration', 'total_credit_hours', 'learning_outcomes'];

    public function trainers()
    {
        return $this->belongsToMany(Trainer::class, 'workshop_trainers', 'workshop_id', 'trainer_id');
    }

    public function getAbsoluteThumbnailPath()
    {
        return asset('public' . Storage::url($this->thumbnail_path));
    }

    public function testimonials()
    {
        return $this->hasMany(WorkshopTestimonial::class);
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }
}
