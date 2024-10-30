<?php
// Include file koneksi database
include "include/include.php";

// Handle query pencarian
$pencarian = isset($_GET['search']) ? $_GET['search'] : '';

// Modifikasi query SQL untuk mencakup kondisi pencarian
$query = "SELECT * FROM destinasitravel";
if (!empty($pencarian)) {
    $query .= " WHERE nama_destinasi LIKE '%$pencarian%'";
}

$datakategori = mysqli_query($connection, $query);

// Output hasil pencarian dalam format JSON
$result = array();
while ($row = mysqli_fetch_assoc($datakategori)) {
    $result[] = $row;
}

echo json_encode($result);
?>
