<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
//            PropertyTypeSeeder::class,
            PropertySeeder::class,
//            AmenitySeeder::class,
//            TenantSeeder::class,
//            DivisionSeeder::class,
//            DistrictSeeder::class,
//            UpazilaSeeder::class,
//            UnionSeeder::class,
//            UserSeeder::class,
        ]);

        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
    }
}
