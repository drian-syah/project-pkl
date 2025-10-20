<style>
@page {
    size: A4 portrait;
    margin: 15mm 20mm;
}

body {
    font-size: 14px;
    margin: 0;
}

.kop-surat {
    display: flex;
    align-items: center;
    justify-content: center;
    border-bottom: 3px solid black;
    padding-bottom: 10px;
    margin-bottom: 15px;
    position: relative;
    min-height: 90px;
}

.kop-surat .logo img {
    width: 90px;
    height: auto;
    position: absolute;
    left: 1px;
    top: 0;
}

.kop-teks {
    text-align: center;
    flex: 1;
    padding-left: 100px;
    padding-right: 60px;
}

.kop-teks h2,
.kop-teks h3,
.kop-teks p {
    margin: 0;
    line-height: 1.4;
}

hr.tebal {
    border: 2px solid black;
    margin: 5px 0;
}

.judul {
    text-align: center;
    text-transform: uppercase;
    text-decoration: underline;
    margin: 20px 0 10px 0;
    font-weight: bold;
}

.info {
    text-align: center;
    margin-bottom: 15px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

td {
    padding: 3px 6px;
    vertical-align: top;
}

.ttd {
    width: 300px;
    float: right;
    text-align: center;
    margin-top: 60px;
}

.ttd p {
    margin: 2px;
}
</style>

<!-- === KOP SURAT === -->
<div class="kop-surat">
    <div class="logo">
        <img src="{{ public_path('image/image.png') }}" alt="Logo Dinas">
    </div>
    <div class="kop-teks">
        <h2><strong>PEMERINTAH KOTA CIREBON</strong></h2>
        <h3><strong>DINAS KOMUNIKASI INFORMATIKA DAN STATISTIK</strong></h3>
        <p>Jalan DR. Sudarsono No 40, Kelurahan Kesambi, Kec Kesambi. Telp: 0231-8804620</p>
        <p>Website: https://dkis.cirebonkota.go.id/</p>
    </div>
</div>
<hr class="tebal">

<!-- === JUDUL SURAT === -->
<h2 class="judul">Laporan Data Tugas</h2>

<div class="info">
    <p><strong>Dicetak:</strong> {{ $tanggal }} {{ $jam }}</p>
</div>
<hr>

<table>
    <tbody>
        <tr>
            <td width="30%">Nama</td>
            <td width="2%">:</td>
            <td>{{ $tugas->user->nama }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{ $tugas->user->email }}</td>
        </tr>
        <tr>
            <td>Tugas</td>
            <td>:</td>
            <td>{{ $tugas->tugas }}</td>
        </tr>
        <tr>
            <td>Tanggal Mulai</td>
            <td>:</td>
            <td>{{ $tugas->tanggal_mulai }}</td>
        </tr>
        <tr>
            <td>Tanggal Selesai</td>
            <td>:</td>
            <td>{{ $tugas->tanggal_selesai }}</td>
        </tr>
    </tbody>
</table>

<!-- === TANDA TANGAN === -->
<div class="ttd">
    <p>Mengetahui,</p>
    <p><strong>Kepala Dinas Komunikasi Informatika dan Statistik</strong></p>
    <br><br><br>
    <p><u><strong>Ma'ruf Nuryasa</strong></u></p>
    <p>NIP.</p>
</div>
<hr>
