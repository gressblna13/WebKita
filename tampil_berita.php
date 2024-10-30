<?php
session_start();
if($_SESSION['status'] !="login"){
 header("location:proses_input_berita.php");
}
include "include/include.php";

$sql = "SELECT * FROM berita";
$result = $koneksi->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<h2>" . $row['judul'] . "</h2>";
        echo "<p>" . $row['konten'] . "</p>";
        echo "<img src='berita_gambar/" . $row['gambar'] . "' alt='Gambar Berita'>";
        echo "<hr>";
    }
} else {
    echo "Belum ada berita yang ditambahkan";
}
?>