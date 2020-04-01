<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 4; $i++) {
          $newUser = new User;
          $newUser->name = $faker->name;
          $newUser->email = $faker->email;
          $newUser->password = Hash::make('password');


          $newUser->save();
        }
    }
}
