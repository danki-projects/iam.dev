<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'slug',
        'label',
        'type'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
