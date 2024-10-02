<?php

namespace Database\Seeders;

use App\Models\Resident;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Resident::create([
            "nik" => 12345678910,
            "name" => "jefyokta",
            "birthday" => "2002-10-06",
            "gender" => "male",
            "dusun" => "Simpang Tiga",
            "rt" => "02",
            "rw" => "02",
            "religion" => "Islam",
            "father_name" => "jefysFather",
            "father_job" => "Petani",
            "father_birthday" => "1970-5-20",
            "mother_name" => "jefysMother",
            "job" => "Pelajar/Mahasiswa",
            "last_study" => "SMA Sederajat",
            "current_study" => "none",
            "born_in" => "Pintugobang",
            "no_kk"=>"12334567890",
            "status"=>"Lajang",
            "status_in_family"=>"anak"
        ]);
    }
}
