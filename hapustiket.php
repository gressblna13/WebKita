<?php
include "include/include.php";

if (isset($_GET['hapus'])) {
    $namaTIKET = $_GET['hapus']; // Menyesuaikan nama variabel
    $namaTIKET = mysqli_real_escape_string($connection, $namaTIKET); // Melindungi dari serangan SQL injection
    mysqli_query($connection, "DELETE FROM tiketting WHERE namaTIKET = '$namaTIKET'");
    header("location:tiketting.php");
}
?>
