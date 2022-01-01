<?php

namespace App\repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Model\Post;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class PostsRepository
 * @package App\repositories
 */
class PostsRepository implements PostRepositoryInterface
{

    public function getBySlug(string $slug_category, string $slug): ?Post
    {
        return Post::where('slug', $slug)
            ->whereHas('category', function ($query) use ($slug_category) {
                $query->where('slug', $slug_category)
                    ->active();
            })->with(['category'])
            ->first();
    }

    public function getByViews(?int $quantity = 4): Collection
    {
        return Post::where('status', true)
            ->whereHas('category', function ($q) {
                $q->active();
            })
            ->limit($quantity)
            ->get();
    }
}
