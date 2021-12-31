<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\Category::class, 10)
            ->create()
            ->each(function ($category) {
                $category->posts()->saveMany(factory(\App\Model\Post::class, 5)->create()
                    ->each(function ($post) {
                    $post->images()->saveMany(
                        factory(\App\Model\Image::class, 3)->make()
                    );
                }));
            });
    }
}
