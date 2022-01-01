<?php


namespace App\repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Model\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoriesRepository implements CategoryRepositoryInterface
{
    public function getBySlug(string $slug): ?Category
    {
        return Category::where('slug', $slug)->first();
    }

    public function getCategoriesToMenu(): Collection
    {
        return Category::where('status', true)->get();
    }
}
