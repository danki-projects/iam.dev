<?php


namespace App\repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Model\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class CategoriesRepository implements CategoryRepositoryInterface
{
    public function getBySlug(string $slug): ?Category
    {
        return Category::where('slug', $slug)->first();
    }

    public function getCategoriesToMenu(): ?Collection
    {
        try {
            DB::connection()->getPdo();
            return Category::where('status', true)->get();
        } catch (\Exception $e) {
            return null;
        }
    }
}
