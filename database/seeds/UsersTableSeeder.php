<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 4; $i++) {
          $newUser = new User;
          $newUser->name = $faker->name;
          $newUser->email = $faker->email;
          $newUser->password = $faker->Hash::make('password');;


          $newUser->save();
        }
    }
}
