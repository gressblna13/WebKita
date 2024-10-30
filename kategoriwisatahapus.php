<?php
include "include/config.php";

if (isset($_GET['hapus'])) {
    $kategoriKODE = $_GET['hapus'];

    // Lakukan query DELETE
    $result = mysqli_query($connection, "DELETE FROM kategoriwisata WHERE kategoriKODE='$kategoriKODE'");

    // Cek apakah penghapusan berhasil
    if ($result) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

// Redirect kembali ke halaman kategoriwisata.php
header("location:kategoriwisata.php");
?>
