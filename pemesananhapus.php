<?php
include "include/include.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_pembeli = $_GET['id'];

    // Hapus data dari database
    $query = "DELETE FROM penjualanoleholeh WHERE id_pembeli = $id_pembeli";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: hasil_pemesanan.php"); // Redirect kembali ke halaman dashboard setelah berhasil hapus
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "Akses tidak sah.";
}
?>
