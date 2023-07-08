<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Innovation extends Model
{
    use HasFactory;

    protected $table = "innovations";

    protected $fillable = ['title', 'description', 'price'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function getAbsoluteThumbnailPath()
    {
        return asset('public' . Storage::url($this->thumbnail_path));
    }


}
