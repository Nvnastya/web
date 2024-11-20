<?php

namespace Database\Seeders;

use App\Models\PersInfo;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PersInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $users = User::all();

        foreach ($users as $user) {
            PersInfo::create([
                'user_id' => $user->id,
                'FIO' => $faker->name,
                'phone' => $faker->unique()->phoneNumber,
                'address' => $faker->address,
            ]);
        }
    }
}
