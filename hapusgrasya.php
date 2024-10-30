<?php
include "include/include.php";
if (isset($_GET['hapus'])) {
    $kodeDestinasi = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM pesonajawa WHERE grasya_id = '$grasya_id");
    header("location:grasya.php");
}
?>
