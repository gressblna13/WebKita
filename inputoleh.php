<!DOCTYPE html>
<html lang="en">

<?php
include "include/include.php";

if (isset($_POST['submit'])) {
    // Mengambil data dari formulir
    $id_pembeli = $_POST['id_pembeli'];
    $nama_pembeli = $_POST['nama_pembeli'];
    $pesanan = $_POST['produk']; // Sesuaikan nama field
    $lokasi = $_POST['lokasi']; // Sesuaikan nama field

    // Gunakan prepared statement untuk mencegah SQL injection
    $stmt = $conn->prepare("INSERT INTO penjualanoleholeh (id_pembeli, nama_pembeli, pesanan, lokasi) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $id_pembeli, $nama_pembeli, $pesanan, $lokasi);
    $stmt->execute();
    $stmt->close();

    // Mengalihkan ke halaman yang menampilkan pesanan berhasil dikirim
    header('Location: pesanan_berhasil.php');
}
?>

<body>
    <!-- Konten HTML sesuai kebutuhan Anda -->

</body>

</html>
