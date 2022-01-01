<?php


namespace App\Interfaces;


use App\Model\Project;
use Illuminate\Database\Eloquent\Collection;

interface ProjectRepositoryInterface
{
    public function getLatestActive(int $quantity): Collection;

    public function getActive();

    public function findBySlug(string $slug): ?Project;

    public function getDescription(): string;
}
