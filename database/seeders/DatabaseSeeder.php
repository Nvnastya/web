<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
        ]);

        $this->call([
            ProductSeeder::class,
        ]);

        $this->call([
            UserSeeder::class,
        ]);

        $this->call([
            PersInfoSeeder::class,
        ]);

        $this->call([
            CartSeeder::class,
        ]);

        $this->call([
            CartItemSeeder::class,
        ]);

        $this->call([
            OrderSeeder::class,
        ]);
    }
}
