<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method create(array $array)
 */
class Comment extends Model
{
     use SoftDeletes;

    protected $casts = [
        'item_id' => 'int',
        'user_id' => 'int',
        'stars' => 'int',
        'status' => 'bool'
    ];

    protected $fillable = [
        'stars',
        'content',
        'item_type',
        'item_id',
        'user_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }
}
