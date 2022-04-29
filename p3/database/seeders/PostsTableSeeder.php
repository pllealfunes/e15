<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use Faker\Factory;

class PostsTableSeeder extends Seeder
{
    private $faker;

    public function run()
    {
        $this->faker = Factory::create();
        $this->addOnePost();
    }

    private function addOnePost()
    {
        $post = new Post();
        $post->created_at = $this->faker->dateTimeThisMonth();
        $post->updated_at = $post->created_at;
        $post->title = 'Crochet 101';
        $post->category = 'creative';
        $post->post = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore et esse optio molestias numquam voluptatum eius ratione tempora eos ullam doloribus, ad expedita placeat laborum suscipit quia reiciendis. Sequi, provident?';
        $post->user_id = User::where('email', '=', 'jill@harvard.edu')->pluck('id')->first();
        $post->save();
    }
}