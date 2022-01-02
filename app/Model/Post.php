<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * Class Post
 * @property Comment $comments
 * @package App\Model
 */
class Post extends Model
{
    use SoftDeletes;

    protected $casts = [
        'id' => 'int',
        'category_id' => 'int',
        'status' => 'bool'
    ];

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'content',
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'item');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getCategorySlugAttribute()
    {
        return $this->category()->first()->slug;
    }
}
