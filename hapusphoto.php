<?php
include "include/include.php";
if (isset($_GET['hapus'])) {
    $kodeFoto = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM photodestinasi WHERE fotodestinasiKODE = '$kodeFoto'");
    header("location:photodestinasi.php");
}
?>