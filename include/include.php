<?php
// Koneksi ke basis data
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gress";

$connection = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
