<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'fullname',
        'professional_title',
        'photo',
        'email',
        'phone',
        'linkedin',
        'github',
        'facebook',
        'cv',
        'about_me'
    ];
}