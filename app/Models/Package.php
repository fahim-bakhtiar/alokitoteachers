<?php

namespace App\Models;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['title','price','duration', 'max_course','max_resource','max_workshop'];


    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function getAbsoluteProfileImagePath()
    {
        return asset('public' . Storage::url($this->icon));
    }
}
