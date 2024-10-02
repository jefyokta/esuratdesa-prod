<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["title" => "Tidak Mampu"],
            ["title" => "Berkelakuan Baik"],
            ["title" => "Rekomendasi Kerja"],
            ["title" => "Usaha"]
        ];

        foreach ($data as $item):
            Category::create($item);
        endforeach;
    }
}
