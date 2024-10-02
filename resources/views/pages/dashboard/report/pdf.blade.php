<!DOCTYPE html>
<html>
<head>
    <title>Laporan Surat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 14px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table th {
            background-color: #f4f4f4;
            text-align: left;
            font-weight: bold;
        }

        table td {
            background-color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Laporan Surat</h1>
        <table>
            <thead>
                <tr>
                    <th>Surat</th>
                    <th>Peminta</th>
                    <th>Nik</th>
                    <th>Keperluan</th>
                    <th>Tanggal</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($letters as $let)
                    <tr>
                        <td>{{ $let->category->title }}</td>
                        <td>{{ $let->resident->name }}</td>
                        <td>{{ $let->resident->nik }}</td>
                        <td>{{ $let->needed_for }}</td>
                        <td>{{ \Carbon\Carbon::parse($let->created_at)->translatedFormat('d F Y') }}</td>
                        <td>{{ $let->resident->dusun . ', RW' . $let->resident->rw . '/RT ' . $let->resident->rt }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
