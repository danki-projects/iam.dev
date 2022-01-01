<?php

namespace App\Http\Controllers;

use App\repositories\CategoriesRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($category_slug, CategoriesRepository $categoriesRepository)
    {
        try {
            $category = $categoriesRepository->getBySlug($category_slug);
            return view('categories', [
                'category' => $category,
                'title' => env('APP_NAME') . " - {$category->name}",
                'posts' => $category->posts()->get()
            ]);
        } catch (\Exception $exception) {
            abort(404);
        }
    }
}
