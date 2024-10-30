<?php
include "include/include.php";

if (isset($_POST['id_div'])) {
    $idDiv = $_POST['id_div'];

    // Gantilah query ini sesuai dengan struktur database Anda
    $result = mysqli_query($connection, "DELETE FROM penjualanoleholeh WHERE id_pembeli = '$idDiv'");

    if ($result) {
        $response = array('status' => 'success', 'message' => 'Data berhasil dihapus.');
    } else {
        $response = array('status' => 'error', 'message' => 'Gagal menghapus data.');
    }

    echo json_encode($response);
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Parameter tidak valid.'));
}
?>
