<?php


namespace App\Interfaces;


interface ResearchRepositoryInterface
{
    public function find(string $slug);

    public function findProjectByName(string $name);

    public function findPostByName(string $name);
}
