<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Laporan Data Tugas</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 40px;
        }

        /* === KOP SURAT === */
        .kop-surat {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            border-bottom: 3px solid black;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .kop-surat .logo img {
            width: 90px;
            height: auto;
            margin-right: 15px;
            margin-top: 5px;
            position: absolute;
        }

        .kop-teks {
            text-align: center;
            flex: 1;
            padding-top: 5px;
        }

        .kop-teks h2, 
        .kop-teks h3, 
        .kop-teks p {
            margin: 0;
            line-height: 1.4;
        }

        hr.tebal {
            border: 2px solid black;
            margin: 0;
        }

        /* === JUDUL === */
        .judul {
            text-align: center;
            text-transform: uppercase;
            text-decoration: underline;
            margin: 15px 0 10px 0;
        }

        .info {
            text-align: center;
            margin-bottom: 15px;
            font-size: 14px;
        }

        /* === TABEL === */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 6px;
            text-align: center;
            font-size: 13px;
        }

        td:nth-child(2),
        td:nth-child(3),
        td:nth-child(4) {
            text-align: left;
        }

        /* === TANDA TANGAN === */
        .ttd {
            width: 300px;
            float: right;
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
        }

        .ttd p {
            margin: 2px;
        }

        @media print {
            body {
                margin: 0;
            }
        }
    </style>
</head>
<body>
    <!-- === KOP SURAT === -->
    <div class="kop-surat">
        <div class="logo">
            <img src="{{ public_path('image/image.png') }}" alt="Logo Dinas">
        </div>
        <div class="kop-teks">
            <h2><strong>PEMERINTAH KOTA CIREBON</strong></h2>
            <h3><strong>DINAS KOMUNIKASI INFORMATIKA DAN STATISTIK</strong></h3>
            <p>Alamat: . Telp.</p>
            <p>Website</p>
        </div>
    </div>
    <hr class="tebal">

    <!-- === JUDUL SURAT === -->
    <h2 class="judul">Laporan Data Tugas</h2>

    <div class="info">
        <p><strong>Dicetak:</strong> {{ $tanggal }} {{ $jam }}</p>
    </div>

    <!-- === TABEL DATA === -->
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="20%">Nama</th>
                <th width="25%">Email</th>
                <th width="25%">Tugas</th>
                <th width="12%">Tanggal Mulai</th>
                <th width="12%">Tanggal Selesai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tugas as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->nama }}</td>
                    <td>{{ $item->user->email }}</td>
                    <td>{{ $item->tugas }}</td>
                    <td>{{ $item->tanggal_mulai }}</td>
                    <td>{{ $item->tanggal_selesai }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- === TANDA TANGAN === -->
    <div class="ttd">
        <p>Mengetahui,</p>
        <p><strong>Kepala Dinas Komunikasi Informatika Dan Statistik</strong></p>
        <br><br><br>
        <p><u><strong>Nama</strong></u></p>
        <p>NIP.</p>
    </div>
</body>
</html>
