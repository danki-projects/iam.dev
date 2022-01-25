<?php


namespace App\repositories;


use App\Interfaces\ProjectRepositoryInterface;
use App\Model\Project;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class ProjectsRepository implements ProjectRepositoryInterface
{

    public function getLatestActive(?int $quantity = 3): Collection
    {
        return Project::where('status', true)
            ->orderByDesc('id')
            ->limit($quantity)
            ->get();
    }

    public function getDescription(): string
    {
        $str = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, adipisci amet architecto aut autem 
        consequuntur culpa distinctio in magnam molestiae molestias nam quas qui quisquam veniam vitae voluptate 
        voluptatibus voluptatum.';
        return Str::limit($str, 160, false);
    }

    public function getActive()
    {
        return Project::active()->paginate(5);
    }

    public function findBySlug(string $slug): ?Project
    {
        return Project::active()->where('slug', $slug)->first();
    }

    public function count()
    {
        return Project::active()->count();
    }
}
