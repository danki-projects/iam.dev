<?php

namespace App\Http\Controllers;

use App\repositories\PostsRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($category_slug, $post_slug, PostsRepository $postsRepository)
    {
        $post = $postsRepository->getBySlug($category_slug, $post_slug);

        return view('posts', [
            'post' => $post,
            'title' => env('APP_NAME') . " - {$post->name}",
        ]);
    }
}
