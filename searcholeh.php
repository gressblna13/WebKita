<?php
include "include/include.php";

if (isset($_POST['search'])) {
    $searchTerm = $_POST['search'];

    // Query untuk mencari oleh-oleh berdasarkan nama
    $query = "SELECT * FROM penjualanoleholeh WHERE nama_pembeli LIKE '%$searchTerm%'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Menampilkan hasil pencarian
        while ($row = mysqli_fetch_assoc($result)) {
            // Menampilkan hasil sesuai kebutuhan, termasuk gambar
            echo "<div class='card custom-card'>";
            echo "<img src='" . $row['gambar'] . "' class='card-img-top' alt='" . $row['nama_pembeli'] . "'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $row['nama_pembeli'] . "</h5>";
            echo "<p class='card-text'>Pesanan: " . $row['pesanan'] . "</p>";
            echo "<p class='card-text'>Lokasi: " . $row['lokasi'] . "</p>";
            echo "</div>";
            echo "</div>";
            echo "<br>";
        }
    } else {
        echo "Error dalam query: " . mysqli_error($connection);
    }
}

if (isset($_POST['Simpan'])) {
    $id_pembeli = $_POST['id_pembeli'];
    $nama_pembeli = $_POST['nama_pembeli'];
    $pesanan = $_POST['pesanan'];
    $produk = $_POST['produk'];
    $lokasi = $_POST['lokasi'];

    // Ambil kategori sebagai array
    $kategori = isset($_POST['kategori']) ? implode(",", $_POST['kategori']) : '';

    mysqli_query($connection, "INSERT INTO penjualanoleholeh VALUES ('$id_pembeli', '$nama_pembeli', '$pesanan', '$produk','$lokasi')");

    $gambar = "path/to/..images.jpg"; // Gantilah dengan path atau nama file yang sesuai
    mysqli_query($connection, "UPDATE penjualanoleholeh SET gambar = '$gambar' WHERE id_pembeli = '$id_pembeli'");
}

$datakategori = mysqli_query($connection, "SELECT * FROM penjualanoleholeh");
?>
