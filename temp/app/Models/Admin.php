<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email'];
    
    public function getAbsoluteProfileImagePath()
    {
        return asset('public' . Storage::url($this->image));
    }
}
