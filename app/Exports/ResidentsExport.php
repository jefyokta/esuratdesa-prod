<?php

namespace App\Exports;

use App\Models\Resident;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResidentsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Resident::all(['nik','name','birthday','born_in','gender','job','religion','dusun','rt','rw','no_kk','status','status_in_family','father_name','father_birthday','father_job','mother_name','last_study','current_study']);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'NIK',
            'Nama',
            'Tanggal Lahir',
            'Tempat Lahir',
            'Jenis Kelamin',
            'Pekerjaan',
            'Agama',
            'Dusun',
            'RT',
            'RW',
            'No KK',
            'Status',
            'Status dalam Keluarga',
            'Nama Ayah',
            'Tanggal Lahir Ayah',
            'Pekerjaan Ayah',
            'Nama Ibu',
            'Pendidikan Terakhir',
            'Pendidikan Sekarang',
        ];
    }
}
