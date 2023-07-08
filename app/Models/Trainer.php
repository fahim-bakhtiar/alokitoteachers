<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Trainer extends Model
{
    use HasFactory;

    protected $table = "trainers";

    protected $fillable = ['first_name', 'last_name', 'about'];

    public function getAbsoluteProfileImagePath()
    {
        return asset('public' . Storage::url($this->profile_image_path));
    }
}
