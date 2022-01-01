<?php

namespace App\Http\Controllers;

use App\repositories\PostsRepository;
use App\repositories\ProjectsRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index(ProjectsRepository $projectsRepository, PostsRepository $postsRepository)
    {
        $projects = $projectsRepository->getLatestActive();
        $posts = $postsRepository->getByViews();

        return view('home', [
            'projects' => $projects,
            'posts' => $posts
        ]);
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
