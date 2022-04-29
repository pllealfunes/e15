<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Faker\Factory;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $faker;

    public function run()
    {
        $this->faker = Factory::create();
        $this->addOneComment();
    }

    private function addOneComment()
    {
        $comment = new Comment();
        $comment->created_at = $this->faker->dateTimeThisMonth();
        $comment->updated_at = $comment->created_at;
        $comment->comment = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore et esse optio molestias numquam voluptatum eius ratione tempora eos ullam doloribus, ad expedita placeat laborum suscipit quia reiciendis. Sequi, provident?';
        $comment->post_id = Post::where('id', '=', '1')->pluck('id')->first();
        $comment->user_id = User::where('email', '=', 'jill@harvard.edu')->pluck('id')->first();
        $comment->save();
    }
}