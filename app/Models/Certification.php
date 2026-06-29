<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [

        'title',

        'organization',

        'obtained_at',

        'certificate_file'

    ];
}