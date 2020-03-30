<?php

use Illuminate\Database\Seeder;
use App\Comment;
use Faker\Generator as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 15; $i++) {
          $newComment = new Comment;
          $newComment->text = $faker->sentence(8);
          $newComment->post_id = rand(1, 12);

          $newComment->save();
      }
    }
}
