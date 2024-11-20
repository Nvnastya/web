<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cart;
use Faker\Factory as Faker;
use App\Models\User;

class CartSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        $users = User::all();

        foreach ($users as $user) {
            Cart::create([
                'user_id' => $user->id,
                'total' => $faker->randomFloat(2, 1, 1000),
            ]);
        }
    }
}
