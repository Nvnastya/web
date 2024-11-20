<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CartItem;
use App\Models\Cart;
use App\Models\Product;
use Faker\Factory as Faker;

class CartItemSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $carts = Cart::all();
        $products = Product::all();

        foreach (range(1, 10) as $index) {
            CartItem::create([
                'cart_id' => $faker->randomElement($carts)->id,
                'product_id' => $faker->randomElement($products)->id,
                'quantity' => $faker->numberBetween(1, 5),
                'sum' => $faker->randomFloat(2, 1, 1000),
            ]);
        }
    }
}
