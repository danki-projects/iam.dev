<?php

namespace App\Http\Controllers;

use App\repositories\ProjectsRepository;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(ProjectsRepository $projectsRepository)
    {
        $projects = $projectsRepository->getActive();
        return view('projects', [
            'projects' => $projects,
            'title' => env('APP_NAME') . " - " . __('app.projects'),
            'description' => $projectsRepository->getDescription()
        ]);
    }

    public function show($project_slug, ProjectsRepository $projectsRepository)
    {
        $project = $projectsRepository->findBySlug($project_slug);
        return view('project-show', [
            'project' => $project,
            'title' => env('APP_NAME') . " - " . $project->description,
        ]);
    }
}
