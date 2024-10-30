<?php
include "include/include.php";
if (isset($_GET['hapus'])) {
    $id_destinasi = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM destinasitravel WHERE id_destinasi = '$id_destinasi'");
    header("location:destinasitravel.php");
}
?>
