@extends('letter.layouts.letter')
@section('content')
    <div class="text-center">
        <h3><u>SURAT KETERANGAN USAHA</u></h3>
        <p>Nomor: {{ $letter['number'] }}</p>
    </div>
    <div class="content">
        <p class="p">Yang bertanda tangan di bawah ini, Kepala Desa Tani Makmur Kecamatan Rengat Barat Kabupaten
            Indragiri Hulu, dengan ini menerangkan bahwa:</p>
        <br>

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
                <td>: RT.{{ $person['rt'] }} / RW.{{ $person['rw'] }}Desa Tani Makmur</td>
            </tr>
        </table>

        <div class="line"></div>
        <br><br>
        <p class="p-md">Yang bersangkutan tersebut diatas adalah benar warga Desa Tani Makmur kecamatan Rengat Barat
            mempunyai usaha {{ $letter['details'] }} Apabila dikemudian hari diketahui bahwa keterangan tersebut palsu maka
            yang
            bersangkutan sanggup menanggung resiko hukum yang di akibatnya tanpa melibatkan pemerintahan desa.</p>

        <p>Demikian surat Keterangan ini kami buat agar dapat di gunakan sebagaimana semestinya.</p>
    </div>
@endsection
