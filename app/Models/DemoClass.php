<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemoClass extends Model
{
    use HasFactory;

    protected $table = "demo_classes";

    protected $fillable = ['title', 'class', 'subject', 'video_url', 'duration', 'price', 'sale_price'];

    public function classCategory()
    {
        return $this->belongsTo(Category::class, 'class');
    }

    public function subjectCategory()
    {
        return $this->belongsTo(Category::class, 'subject');
    }
}
