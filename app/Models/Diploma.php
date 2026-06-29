<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diploma extends Model
{
    protected $fillable = [

        'title',

        'school',

        'obtained_at',

        'diploma_file'

    ];
}