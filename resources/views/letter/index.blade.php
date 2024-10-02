<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #000;
        }

        .header {
            text-align: center;
        }

        .header img {
            width: 100px;
            margin-bottom: 10px;
        }

        .content {
            margin-top: 20px;
        }

        .footer {
            margin-top: 50px;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h3>KOP SURAT</h3>
            <p>Nama Perusahaan / Organisasi<br>Alamat Lengkap, Kota, Provinsi<br>Email: info@perusahaan.com | Telp: (123) 456-7890</p>
        </div>

        <div class="content">
            <p>{{ date('y-m-d')}}</p>
            <p>Kepada,<br>jepi<br> sfotware<br>ds</p>

            <p>Perihal: test</p>

            <p>Yth. jepi,</p>

            <p>
                Kami ingin menyampaikan bahwa . Dengan demikian, kami berharap Anda dapat memperhatikan hal ini dengan sebaik-baiknya.
            </p>

            <p>
                Jika ada pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami melalui kontak yang telah tersedia. Kami sangat menghargai kerja sama yang baik.
            </p>

            <p>Atas perhatian dan kerja samanya, kami ucapkan terima kasih.</p>
        </div>

        <div class="footer">
            <p>Hormat kami,</p>
            <p>pengirim<br>asd<br></p>
        </div>
    </div>
</body>

</html>