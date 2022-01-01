<?php

namespace App\Interfaces;

use App\Model\Category;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface CategoryRepositoryInterface
 * @package App\Interfaces
 */
interface CategoryRepositoryInterface
{
    public function getBySlug(string $slug): ?Category;

    public function getCategoriesToMenu(): Collection;
}
