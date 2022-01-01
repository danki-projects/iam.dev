<?php


namespace App\repositories;


use App\Interfaces\ResearchRepositoryInterface;
use App\Model\Post;
use App\Model\Project;

class ResearchRepository implements ResearchRepositoryInterface
{

    public function find(string $slug)
    {
        return collect(
            array_merge($this->findProjectByName($slug), $this->findPostByName($slug))
        );
    }

    public function findProjectByName(string $name)
    {
        return Project::where('name', 'LIKE', "%{$name}%")->get()->toArray();
    }

    public function findPostByName(string $name)
    {
        return Post::where('name', 'LIKE', "%{$name}%")->get()->toArray();
    }
}
