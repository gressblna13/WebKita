<?php
include "include/include.php";

$search = isset($_POST['search']) ? $_POST['search'] : '';

$query = "SELECT * FROM restaurant WHERE nama_menu LIKE '%$search%'";
$datakategori = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html lang="id">
<?php include "include/head.php"; ?>

<body class="sb-nav-fixed">
    <?php include "include/navbar.php"; ?>
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

            <div class="container mt-4">
                <h2 class="text-center mb-4">RESTORAN SAYA</h2>

                <div class="card">
                    <div class="card-body">
                    <form action="searchresto.php" method="post" enctype="multipart/form-data">
        <div class="mb-3 d-flex align-items-end">
            <input type="text" name="search" placeholder="Cari..." class="form-control">
            <button type="submit" name="searchButton" class="btn btn-primary ms-2">Cari</button>
        </div>
    </form>
                        <div class="table-container mt-4">
                            <h2 class="text-center mb-4">Hasil Pencarian</h2>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-custom">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>pelanggan_id</th>
                                            <th>Nama Menu</th>
                                            <th>Kategori</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($datakategori)) {
                                            echo "<tr>";
                                            echo "<td>{$row['pelanggan_id']}</td>";
                                            echo "<td>{$row['nama_menu']}</td>";
                                            echo "<td>{$row['category']}</td>";
                                            echo "<td>{$row['description']}</td>";
                                            echo "<td>{$row['price']}</td>";
                                            echo "<td><img src='{$row['images']}' alt='Gambar'></td>";
                                            echo "<td>
                                    <a href='editresto.php?edit={$row['pelanggan_id']}' class='btn btn-warning btn-sm btn-custom'>Edit</a>
                                    <a href='hapusresto.php?hapus={$row['pelanggan_id']}' class='btn btn-danger btn-sm ms-1 btn-custom'>Hapus</a>
                                  </td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "include/footer.php"; ?>
        </div>
    </div>

    <?php include "include/script.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2
