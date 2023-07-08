<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Worksheet extends Model
{
    use HasFactory;

    protected $table = "worksheets";

    protected $fillable = ['title', 'class', 'subject', 'price', 'sale_price'];

    public function classCategory()
    {
        return $this->belongsTo(Category::class, 'class');
    }

    public function subjectCategory()
    {
        return $this->belongsTo(Category::class, 'subject');
    }

    public function getAbsoluteFilePath()
    {
        return asset('public' . Storage::url($this->file_path));
    }
}
