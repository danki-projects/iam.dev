<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\User::class, 50)->create()->each(function ($user) {
            if ($user->type !== \App\Model\User::Admin) {
                $user->comments()->saveMany(factory(\App\Model\Comment::class, rand(5, 30))->make());
            }
        });
    }
}
