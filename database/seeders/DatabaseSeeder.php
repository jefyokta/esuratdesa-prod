<?php

namespace Database\Seeders;

use App\Models\Category;
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
        User::factory()->create([
            'name' => 'administrator',
            "username" => "admin",
            "password" => bcrypt("admintm1"),
            "role" => "admin"
        ]);
        User::factory()->create([
            'name' => 'MUHAMMAD SULISTIONO',
            "username" => "kades",
            "password" => bcrypt("tanimakmur"),
            "role" => "kades"
        ]);

        $this->call([CategorySeeder::class, ResidentSeeder::class, VillageManagerSeeder::class]);
    }
}
