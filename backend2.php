<?php
include "include/include.php";

if (isset($_POST['Simpan'])) {
    // Get form data
    $id_shine = $_POST['id_shine'];
    $nama = $_POST['nama'];
    $gambar = $_POST['gambar'];

    // Insert data into the database
    $sql = "INSERT INTO shine (id_shine, nama, gambar) VALUES ('$id_shine', '$nama', '$gambar')";
    $result = mysqli_query($connection, $sql);

    // Check if the query was successful
    if ($result) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

// Close the database connection
mysqli_close($connection);
?>
