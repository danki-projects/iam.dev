<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\Project::class, 20)->create()->each(function ($project) {
            $project->images()->saveMany(
                factory(\App\Model\Image::class, 6)->make()
            );
        });
    }
}
