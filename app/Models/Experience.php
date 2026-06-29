<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [

        'job_title',

        'company',

        'location',

        'start_date',

        'end_date',

        'current_job',

        'description',

        'image'

    ];

    protected $casts = [

        'current_job' => 'boolean'

    ];
}