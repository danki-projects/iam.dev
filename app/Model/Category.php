<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * @property string $slug
 * @method static where(string $string, string $slug)
 */
class Category extends Model
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
        'status',
    ];

    protected $dates = [
        'created_at',
        'update_at',
        'deleted_at',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function getActive()
    {
        return $this->active()->get();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
