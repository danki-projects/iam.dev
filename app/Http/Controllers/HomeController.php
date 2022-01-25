<?php

namespace App\Http\Controllers;

use App\repositories\PostsRepository;
use App\repositories\ProjectsRepository;
use App\repositories\ResearchRepository;
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
        $this->middleware('auth')->only('dashboard');
    }

    public function index(ProjectsRepository $projectsRepository, PostsRepository $postsRepository)
    {
         return view('home', [
            'projects' => $projectsRepository->getLatestActive(),
            'posts' => $postsRepository->getByViews(),
            'projectCount' => $projectsRepository->count(),
            'postCount' => $postsRepository->count(),
        ]);
    }

    public function search(Request $request, ResearchRepository $researchRepository)
    {
        $researches = $researchRepository->find($request->get('params'));
        return view('searched', [
            'searched' => $request->get('params'),
            'researches' => $researches
        ]);
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
