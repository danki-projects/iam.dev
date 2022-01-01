<?php


namespace App\Interfaces;

use App\Model\Post;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface PostRepositoryInterface
 * @package App\Interfaces
 */
interface PostRepositoryInterface
{
    public function getBySlug(string $slug_category, string $slug): ?Post;

    public function getByViews(int $quantity): Collection;
}
