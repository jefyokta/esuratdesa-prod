<?php

namespace Database\Seeders;

use App\Models\VillageManager;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillageManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VillageManager::create(["name"=>"Muhammad Sulistiono","role"=>"Kepala Desa","sign"=>"rsa46(jefuoajokasdjosad)"]);
    }
}
