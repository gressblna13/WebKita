<!-- searchpesan.php -->

<?php
include "include/include.php";

// Inisialisasi variabel pencarian
$search = "";
if (isset($_POST['search'])) {
    $search = $_POST['search'];
}

// Query pencarian ke database
$query = "SELECT * FROM penjualanoleholeh WHERE nama_pembeli LIKE '%$search%'";
$result = mysqli_query($connection, $query);

// Tampilkan hasil pencarian
if (mysqli_num_rows($result) > 0) {
    echo "<table class='table table-striped table-bordered'>
            <thead class='thead-dark'>
                <tr>
                    <th>No Pembeli</th>
                    <th>Nama Pembeli</th>
                    <th>Pesanan</th>
                    <th>Lokasi</th>
                    <th>Aksi</th> <!-- Kolom untuk aksi -->
                </tr>
            </thead>
            <tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id_pembeli']}</td>
                <td>{$row['nama_pembeli']}</td>
                <td>{$row['pesanan']}</td>
                <td>{$row['lokasi']}</td>
                <td class='text-center'>
                    <a href='edit.php?id={$row['id_pembeli']}' class='btn btn-warning btn-sm' title='Edit'>
                        <i class='fas fa-edit'></i>
                    </a>
                    <a href='hapus.php?id={$row['id_pembeli']}' class='btn btn-danger btn-sm' title='Hapus'>
                        <i class='fas fa-trash'></i>
                    </a>
                </td>
            </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<div class='alert alert-info' role='alert'>Tidak ada hasil yang ditemukan.</div>";
}

mysqli_close($connection);
?>
