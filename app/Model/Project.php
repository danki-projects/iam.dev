<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Project extends Model
{
    use SoftDeletes;

    protected $casts = [
        'id' => 'int',
        'status' => 'bool'
    ];

    protected $fillable = [
        'name',
        'slug',
        'description',
        'content',
        'company_name',
        'company_url',
        'status',
    ];

    protected $dates = [
        'created_at',
        'update_at',
        'deleted_at',
    ];

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}