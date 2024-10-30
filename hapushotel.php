<?php
include "include/include.php";

if (isset($_GET['hapus'])) {
    $hotel0160 = $_GET['hapus']; // Menggunakan variabel yang sesuai
    mysqli_query($connection, "DELETE FROM grasyahotel WHERE hotel0160 = '$hotel0160'");
    header("location:grasyahotel.php");
}
?>
