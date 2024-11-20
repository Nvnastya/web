<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $categorys = Category::all();

        foreach ($categorys as $category) {
            Product::create([
                'name' => $faker->words(3, true),
                'image_url' => $faker->imageUrl(640, 480, 'products', true, 'Faker'),
                'price' => $faker->randomFloat(2, 10, 100),
                'description' => $faker->sentence(10),
                'is_gift' => $faker->boolean(),
                'category_id' => $category->id,
            ]);
        }
    }
}