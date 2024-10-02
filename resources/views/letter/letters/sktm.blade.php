@extends('letter.layouts.letter')
@section('content')
    <div class="text-center">
        <h3><u>SURAT KETERANGAN TIDAK MAMPU</u></h3>
        <p>Nomor: {{ $letter['number'] }} </p>
    </div>
    <div class="content">
        <p class="p">Yang bertanda tangan di bawah ini, Kepala Desa Tani Makmur Kecamatan Rengat Barat Kabupaten
            Indragiri Hulu, dengan ini menerangkan bahwa:</p><br>

        <table class="table-data" style="margin-left:30px">
            <tr>
                <td><strong>Nama Lengkap</strong></td>
                <td>: {{ $person['name'] }}</td>
            </tr>
            <tr>
                <td><strong>Nik</strong></td>
                <td>: {{ $person['nik'] }}</td>
            </tr>
            <tr>
                <td><strong>Tempat Tgl Lahir</strong></td>
                <td>: {{ $person['born_in'] }}, {{ \Carbon\Carbon::parse($person['birthday'])->translatedFormat('d/m/Y') }}
                </td>
            </tr>
            <tr>
                <td><strong>Jenis Kelamin</strong></td>
                <td>: {{ $person['gender'] == 'male' ? 'Laki-Laki' : 'Perempuan' }}</td>
            </tr>

            <tr>
                <td><strong>Agama</strong></td>
                <td>: {{ $person['religion'] }}</td>
            </tr>
            <tr>
                <td><strong>Pekerjaan</strong></td>
                <td>: {{ $person['job'] }}</td>
            </tr>

            <tr>
                <td><strong>Alamat</strong></td>
                <td>: RT.{{ $person['rt'] }} / RW.{{ $person['rw'] }} Desa Tani Makmur</td>
            </tr>
        </table>

        <div class="line"></div>
        <br>
        <p class="p">Adalah Benar {{ $person['status_in_family'] }} dari:</p>
        <br>
        <table class="table-data" style="margin-left:30px">
            <tr>
                <td><strong>Nama </strong></td>
                <td>: {{ $person['father_name'] }}</td>
            </tr>
            <tr>
                <td><strong>Tgl Lahir</strong></td>
                <td>:
                    {{ \Carbon\Carbon::parse($person['father_birthday'])->translatedFormat('d/m/Y') }}
                </td>
            </tr>
            <tr>
                <td><strong>Pekerjaan</strong></td>
                <td>: {{ $person['father_job'] }}</td>
            </tr>

            <tr>
                <td><strong>Alamat</strong></td>
                <td>: RT.{{ $person['rt'] }} / RW.{{ $person['rw'] }} Desa Tani Makmur</td>
            </tr>
        </table>


        <p class="p-md">Nama yang tersebut diatas adalah benar penduduk Desa Tani Makmur Kecamatan Rengat Barat Kabupaten
            Indragiri Hulu dan tergolong dalam keluarga tidak mampu</p>

        <p class="p-md">Demikian Surat Keterangan Tidak Mampu ini diberikan kepada yang bersangkutan untuk dipergunakan
            sebagaimana mestinya.</p>
    </div>
@endsection
