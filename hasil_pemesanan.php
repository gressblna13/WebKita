<!DOCTYPE html>
<html lang="en">

<?php
include "include/include.php";

// Ambil data dari database
$datakategori = mysqli_query($connection, "SELECT * FROM penjualanoleholeh");

// Inisialisasi variabel pencarian
$search = "";
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM penjualanoleholeh WHERE nama_pembeli LIKE '%$search%'";
    $datakategori = mysqli_query($connection, $query);
}
?>

<?php include "include/head.php";?>
<?php include "include/navbar.php";?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "include/menunav.php" ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </main>
            <body>
                <div class="container mt-5">
                    <h2 class="text-center mb-4">Data Pemesanan Oleh-Oleh</h2>
                    <form action="hasil_pemesanan.php" method="post">
                        <div class="form-group mt-2 input-group">
                            <input type="text" class="form-control" id="search" name="search" placeholder="Cari oleh">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-success">Cari</button>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (mysqli_num_rows($datakategori) > 0) {
                        // Jika ada data, tampilkan dalam tabel
                        echo "<table class='table table-striped table-bordered'>
                                <thead class='thead-dark'>
                                    <tr>
                                        <th>No Pembeli</th>
                                        <th>Nama Pembeli</th>
                                        <th>Pesanan</th>
                                        <th>Lokasi</th>
                                        <th>gambar</th>
                                        <th>Aksi</th> <!-- Kolom untuk aksi -->
                                    </tr>
                                </thead>
                                <tbody>";

                        while ($row = mysqli_fetch_assoc($datakategori)) {
                            echo "<tr>
                                    <td>{$row['id_pembeli']}</td>
                                    <td>{$row['nama_pembeli']}</td>
                                    <td>{$row['pesanan']}</td>
                                    <td>{$row['lokasi']}</td>
                                    <td><img src='path/to/your/upload/directory/{$row['gambar']}' alt='Gambar' style='max-width: 100px; max-height: 100px;'></td>
                                    <td class='text-center'>
                                        <a href='editpemesanan.php?id={$row['id_pembeli']}' class='btn btn-warning btn-sm' title='Edit'>
                                            <i class='fas fa-edit'></i>
                                        </a>
                                        <a href='pemesananhapus.php?id={$row['id_pembeli']}' class='btn btn-danger btn-sm' title='Hapus'>
                                            <i class='fas fa-trash'></i>
                                        </a>
                                    </td>
                                </tr>";
                        }

                        echo "</tbody></table>";
                    } else {
                        // Jika tidak ada data
                        echo "<div class='alert alert-info' role='alert'>Belum ada data pemesanan oleh-oleh.</div>";
                    }
                    ?>

                    <a href="penjualanoleholeh.php" class="btn btn-primary mt-3">Kembali ke Form Pemesanan</a>
                </div>

                <?php include "include/footer.php"; ?>
            </div>
        </div>
        <?php include "include/script.php"; ?>
    </body>

</html>
