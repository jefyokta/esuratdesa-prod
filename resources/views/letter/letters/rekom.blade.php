@extends('letter.layouts.rekomLayout')
@section('content')
    <div style="display: flex; width: screen; margin-bottom: 50px; justify-content: space-between;">
        <table style="width: 100%;">
            <tr>
                <td></td>
                <td></td>
                <td>Tani Makmur, {{ \Carbon\Carbon::parse($letter['updated_at'])->translatedFormat('d F Y') }}</td>
                <td></td>
            </tr>
            <tr>
                <td>Nomor</td>
                <td>: {{ $letter['number'] }}</td>
                <td>Kepada Yth,</td>
                <td></td>
            </tr>
            <tr>
                <td>Sifat</td>
                <td>: Biasa</td>
                <td>Bpk Pimpinan {{ $letter['details'] }}</td>
                <td></td>
            </tr>
            <tr>
                <td>Lampiran</td>
                <td>: -</td>
                <td>Di-</td>
                <td></td>
            </tr>
            <tr>
                <td>Perihal</td>
                <td>: <strong>Permohonan Pekerjaan</strong></td>
                <td class="p-md">Tempat</td>
                <td></td>
            </tr>
        </table>


    </div>
    <div class="content">
        <p class="p">Dengan ini datang menghadap Bapak, yaitu seorang warga Desa Tani Makmur Kecamatan Rengat Barat :
        </p>

        <table class="table-data" style="margin: 20px;margin-left:30px">
            <tr>
                <td>Nama Lengkap</td>
                <td>: {{ $person['name'] }}</td>
            </tr>
            <tr>
                <td>Nik</td>
                <td>: {{ $person['nik'] }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{ $person['gender'] == 'male' ? 'Laki-Laki' : 'Perempuan' }}</td>
            </tr>
            <tr>
                <td>Tempat Tgl Lahir</td>
                <td>: {{ $person['born_in'] }}, {{ \Carbon\Carbon::parse($person['birthday'])->translatedFormat('d/m/Y') }}
                </td>
            </tr>
            <tr>
                <td>Kewarganegaraan</td>
                <td>: Indonesia</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>: {{ $person['religion'] }}</td>
            </tr>
            <tr>
                <td>Pendidikan Terakhir</td>
                <td>: {{ $person['last_study'] }}</td>
            </tr>

            <tr>
                <td>Alamat</td>
                <td>: RT.{{ $person['rt'] }} / RW.{{ $person['rw'] }}Desa Tani Makmur</td>
            </tr>
        </table>

        <div class="line"></div>
        <p>Dengan maksud untuk dapat di pekerjakan diperusahaan yang bapak pimpin mengingat Warga Kami yang namanya tersebut
            diatas sangat membutuhkan.</p>
        <p>Dapat kami tambahkan bahwa selama yang bersangkutan berdomisili di Desa Tani Makmur Kecamatan Rengat Barat,
            hubungan dengan masyarakat sekitarnya dikenal baik.</p>

        <p>Demikian surat permohonan ini kami perbuat atas kerjasama dan partisipasinya, kami ucapkan terima kasih.</p>
    </div>
@endsection
