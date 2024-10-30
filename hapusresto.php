<?php
include "include/include.php";

if (isset($_GET['hapus'])) {
    $pelanggan_id = $_GET['hapus'];

    // Gunakan prepared statement untuk mencegah SQL injection
    $stmt = mysqli_prepare($connection, "DELETE FROM restaurant WHERE pelanggan_id = ?");
    mysqli_stmt_bind_param($stmt, 's', $pelanggan_id);
    mysqli_stmt_execute($stmt);
    
    // Periksa apakah penghapusan berhasil sebelum mengarahkan
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        // Penghapusan berhasil
        header("location: restaurant.php");
    } else {
        // Tidak ada data yang dihapus atau terjadi kesalahan
        echo "Gagal menghapus data.";
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
}

// Tutup koneksi
mysqli_close($connection);
?>
