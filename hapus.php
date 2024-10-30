<?php
include "include/include.php";
if (isset($_GET['hapus'])) {
    $kodeDestinasi = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM destinasi WHERE destinasiKODE = '$kodeDestinasi'");
    header("location:destinasi.php");
}
?>
