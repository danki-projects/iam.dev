<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($category_slug, $post_slug)
    {
        return view('posts', [
            'category' => $category_slug,
            'post' => $post_slug
        ]);
    }
}
