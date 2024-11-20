<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $users = User::all();
        $carts = Cart::all();

        foreach (range(1, 10) as $index) {
            Order::create([
                'user_id' => $faker->randomElement($users)->id,
                'cart_id' => $faker->randomElement($carts)->id,
                'total_amount' => $faker->randomFloat(2, 10, 500),
                'status' => $faker->randomElement(['pending', 'completed', 'cancelled']),
            ]);
        }
    }
}
