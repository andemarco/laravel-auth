<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 12; $i++) {
          $newPost = new Post;
          $newPost->title = $faker->sentence(4);
          $newPost->body = $faker->text(255);
          $newPost->photo_path = 'https://picsum.photos/200/300';
          $newPost->user_id = rand(1, 3);

          $newPost->save();
      }
    }
}
