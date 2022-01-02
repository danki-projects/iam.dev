<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
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

    public function comment(CommentRequest $request, $category_slug, $post_slug, PostsRepository $postsRepository)
    {
        if ($post = $postsRepository->getBySlug($category_slug, $post_slug)) {
            $post->comments()->create([
                'content' => $request->comment,
                'user_id' => $request->user()->id,
                'stars' => $request->stars,
                'status' => true
            ]);
            messages('É só aguardar!', 'Seu comentário foi enviado para o administrador aprovar. Obrigado!', 'info');
            return redirect()->back();
        }
        messages('Houve um problema!', 'Não foi possível encontrar esta postagem.');
        return redirect()->back();
    }
}
