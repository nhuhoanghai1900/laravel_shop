<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        User::firstOrCreate(
            ['name' => 'Test User'],
            ['email' => 'test@example.com']
        );

        // User::factory()->create(
        //     [
        //         'name' => 'Test User',
        //         'email' => 'test@example.com',
        //     ]
        // );

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            DescriptionSeeder::class
        ]);
    }
}
