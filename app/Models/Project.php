<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [

        'title',
        'slug',
        'project_type',
        'project_date',
        'technologies',
        'short_description',
        'full_description',
        'thumbnail',
        'github_link',
        'demo_link',
        'featured'

    ];

    protected $casts = [

        'featured' => 'boolean'

    ];

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function videos()
    {
        return $this->hasMany(ProjectVideo::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}