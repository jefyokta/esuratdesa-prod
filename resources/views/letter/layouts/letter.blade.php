<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Tidak Mampu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0 10px;
        }

        p {
            font-size: 12px;

        }

        td {
            font-size: 12px;
        }

        tr {
            font-size: 12px;
        }

        .p {
            text-indent: 25px;
        }

        .p-md {
            text-indent: 35px;
        }

        .header {
            text-align: center;
        }

        .content {
            margin-top: 20px;
        }

        .table-data {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;

        }

        .table-data td {
            padding: 0;
            font-size: 12px;

        }

        .signature {
            text-align: right;
            margin-top: 40px;
        }

        .signature p {
            margin: 0;
        }

        .line-1 {
            border-bottom: 3px solid black;
            margin: 5px 0;
        }

        h3 {
            margin: 0;
        }

        h4 {
            margin: 0;
        }

        .text-center {
            text-align: center;
        }

        .head {
            display: flex;
            justify-content: center;
            position: relative;
        }

        .img-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            padding-right: 50px;
            position: absolute;
            left: 40px;
            top: 20px;

        }
    </style>
</head>

<body>
    <div class="head">
        <div class="img-wrapper">
            @php
                $path = public_path('img/logodesa.png');
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            @endphp
            <img src="{{ $base64 }}" alt="" width="60" height="80">
        </div>
        <div class="header">
            <h3>PEMERINTAH KABUPATEN INDRAGIRI HULU</h3>
            <h4>KECAMATAN RENGAT BARAT</h4>
            <h4>DESA TANI MAKMUR</h4>
            <p>Alamat: Desa Tani Makmur Line IV, Kode pos 29351</p>
        </div>
    </div>
    <div class="line-1" style="height: "></div>
    {{-- <div class="line-1"></div> --}}
    @yield('content')
    @php
        $path = public_path('img/kode.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    @endphp
    <div class="signature">
        <p>Dikeluarkan di: Tani Makmur</p>
        <p>Pada Tanggal: {{ \Carbon\Carbon::parse($letter['updated_at'])->translatedFormat('d F Y') }}
        </p>
        <p>{{ $issuer['role'] }} Tani Makmur</p>
        <img src="{{ $base64 }}" alt="" width="80" height="80" style="margin: 10px">
        {{-- <p><strong>..................................</strong></p> --}}
        <br>
        <p style="text-transform: capitalize"><strong>{{ $issuer['name'] }}</strong></p>
    </div>
</body>

</html>
