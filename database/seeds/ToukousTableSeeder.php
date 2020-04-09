<?php

use Illuminate\Database\Seeder;
use App\Toukou;
use App\Comment;

class ToukousTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Toukou::class, 50)->create()->each(function ($toukou) {
            $comments = factory(App\Comment::class, 2)->make();
            $toukou->comments()->saveMany($comments);
        });
    }
}
