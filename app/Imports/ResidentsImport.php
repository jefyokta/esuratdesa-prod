<?php

namespace App\Imports;

use App\Models\Resident;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ResidentsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $row = array_map(function ($value) {
            return str_replace(' ', '_', strtolower($value));
        }, $row);
        // dd($row);
        $exist = Resident::select('*')->where('nik', $row['nik'])->first();
        if (!$exist) {
            $gender = ['male', 'female'];

            return new Resident([
                'nik' => $row['nik'],
                'name' => $row['nama'],
                'birthday' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_lahir']),
                'born_in' => $row['tempat_lahir'],
                'gender' => in_array($row['jenis_kelamin'], $gender) ? $row['jenis_kelamin'] : ($row['jenis_kelamin'] == 'perempuan' ? 'female' : 'male'),
                'job' => $row['pekerjaan'],
                'religion' => $row['agama'],
                'dusun' => $row['dusun'],
                'rt' => $row['rt'],
                'rw' => $row['rw'],
                'no_kk' => $row['no_kk'],
                'status' => $row['status'],
                'status_in_family' => $row['status_dalam_keluarga'],
                'father_name' => $row['nama_ayah'],
                'father_birthday' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_lahir_ayah']),
                'father_job' => $row['pekerjaan_ayah'],
                'mother_name' => $row['nama_ibu'],
                'last_study' => $row['pendidikan_terakhir'],
                'current_study' => $row['pendidikan_sekarang'],
            ]);
        }

        return null;
    }
}
