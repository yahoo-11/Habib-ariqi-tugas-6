<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Cek apakah form dikirim lewat POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['nama'])) {
    die("Silakan isi form terlebih dahulu. <a href='index.html'>Kembali ke form</a>");
}

// Ambil data dari form
$nama          = htmlspecialchars($_POST['nama']);
$kode_pesawat  = htmlspecialchars($_POST['kode_pesawat']);
$kelas         = htmlspecialchars($_POST['kelas']);
$jumlah_tiket  = (int) $_POST['jumlah_tiket'];

// Harga per kelas
$harga = array(
    "Eksekutif" => 30000000,
    "Bisnis"    => 8000000,
    "Ekonomi"   => 4000000
);

$total = $harga[$kelas] * $jumlah_tiket;
?>
<!DOCTYPE html>
<html>
<head>
<title>Hasil Pemesanan Tiket</title>
<style>
  body { font-family: Arial, sans-serif; }
  .kotak {
    border: 1px solid #999;
    width: 350px;
    padding: 15px;
  }
  .judul {
    text-align: center;
    font-weight: bold;
    border-bottom: 1px solid #999;
    padding-bottom: 8px;
    margin-bottom: 15px;
  }
  table td { padding: 5px; }
</style>
</head>
<body>

<div class="kotak">
  <div class="judul">HASIL PEMESANAN TIKET</div>

  <table>
    <tr><td>Nama</td><td>:</td><td><?php echo $nama; ?></td></tr>
    <tr><td>Kode Pesawat</td><td>:</td><td><?php echo $kode_pesawat; ?></td></tr>
    <tr><td>Kelas</td><td>:</td><td><?php echo $kelas; ?></td></tr>
    <tr><td>Jumlah Tiket</td><td>:</td><td><?php echo $jumlah_tiket; ?></td></tr>
    <tr><td>Total Bayar</td><td>:</td><td>Rp <?php echo number_format($total, 0, ',', '.'); ?></td></tr>
  </table>

  <br>
  <a href="index.html">Pesan Lagi</a>
</div>

</body>
</html>