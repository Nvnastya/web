<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $cosmeticCategories = [
            'Skin Care', 
            'Makeup', 
            'Hair Care', 
            'Fragrances', 
            'Nail Care', 
            'Men’s Grooming', 
            'Beauty Tools', 
            'Bath & Body', 
            'Natural & Organic', 
            'Luxury Beauty'
        ];

        foreach ($cosmeticCategories as $category) {
            Category::create([
                'name' => $category,
                'description' => $faker->sentence,
            ]);
        }
    }
}