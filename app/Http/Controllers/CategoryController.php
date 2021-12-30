<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($category_slug)
    {
        return view('categories', [
           'category' => $category_slug
        ]);
    }
}
