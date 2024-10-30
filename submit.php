<!DOCTYPE html>
<html lang="en">
<?php
include "include/include.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Simpan'])) {
    $pelanggan_id = $_POST['pelanggan_id'];
    $nama_menu = $_POST['namamenu'];
    $category = $_POST['categorymenu'];
    $description = $_POST['descriptionmenu'];
    $price = $_POST['price'];

    // Periksa apakah file diunggah
    if ($_FILES['image']['error'] == 0) {
        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        // Pemrosesan gambar
        $resized_file = $target_dir . "resized_" . basename($_FILES["image"]["name"]);
        list($width, $height) = getimagesize($_FILES["image"]["tmp_name"]);
        $new_width = 1000;
        $new_height = 600;

        $image_p = imagecreatetruecolor($new_width, $new_height);
        $image = imagecreatefromjpeg($_FILES["image"]["tmp_name"]);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        imagejpeg($image_p, $resized_file);
        imagedestroy($image_p);

        // Pindahkan berkas yang diunggah ke tujuan
        if (move_uploaded_file($resized_file, $target_file)) {
            // Berhasil mengunggah file
            $images = $target_file;
        } else {
            // Gagal mengunggah file
            $images = NULL;
        }
    } else {
        // Tidak ada file yang diunggah
        $images = NULL;
    }

    $stmt = mysqli_prepare($connection, "INSERT INTO restaurant (pelanggan_id, nama_menu, category, description, price, images) VALUES (?, ?, ?, ?, ?, ?)");

    mysqli_stmt_bind_param($stmt, 'ssssds', $pelanggan_id, $nama_menu, $category, $description, $price, $images);

    mysqli_stmt_execute($stmt);

    header("location: restaurant.php");
    exit();
}

$datakategori = mysqli_query($connection, "SELECT * FROM restaurant");
?>
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
                <h2 class="text-center mb-4">RESTAURAN KU</h2>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-primary text-white text-center">
                                Form Menu
                            </div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="pelanggan_id" class="form-label">pelanggan_id:</label>
                                        <input type="text" name="pelanggan_id" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="namamenu" class="form-label">Nama Menu:</label>
                                        <input type="text" name="namamenu" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="categorymenu" class="form-label">Kategori:</label>
                                        <select name="categorymenu" id="categorymenu" class="form-select">
                                            <option value="Appetizer">Appetizer</option>
                                            <option value="Main Dish">Main Dish</option>
                                            <option value="Dessert">Dessert</option>
                                            <option value="Drink">Drink</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="descriptionmenu" class="form-label">Deskripsi:</label>
                                        <textarea name="descriptionmenu" class="form-control"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="price" class="form-label">Harga:</label>
                                        <input type="number" name="price" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="images" class="form-label">Images</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>

                                    <button type="submit" name="Simpan" class="btn btn-success">Simpan</button>
                                </form>
                            </div>

                            <!-- Tombol view untuk melihat gambar -->
                            <div class="card-footer">
                                <a href="fotorestaurant.php" class="btn btn-info">View Gambar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .table-custom {
                    border-collapse: separate;
                    border-spacing: 0 8px;
                }

                .table-custom th,
                .table-custom td {
                    font-weight: bold;
                    font-family: 'Arial', sans-serif; /* Ganti dengan font yang diinginkan */
                }

                .table-custom th,
                .table-custom td,
                .table-custom thead th {
                    border: 1px solid #dee2e6; /* Ubah warna sesuai kebutuhan */
                    border-radius: 12px; /* Menambahkan sudut lengkung */
                }

                .table-custom thead th {
                    background-color: #343a40; /* Warna latar belakang header */
                    color: #ffffff; /* Warna teks header */
                }

                .table-custom tbody tr:hover {
                    background-color: #f8f9fa; /* Warna latar belakang saat hover */
                }

                .btn-custom {
                    border-radius: 12px; /* Menambahkan sudut lengkung pada tombol */
                }
            </style>

            <div class="table-container mt-4">
                <h2 class="text-center mb-4">Daftar Menu</h2>
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
                                <th>Action</th>
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
                                        <a href='hapusresto.php?hapus={$row['pelanggan_id']}' class='btn btn-danger btn-sm ms-1 btn-custom'>Delete</a>
                                      </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>

        <?php include "include/footer.php"; ?>
    </div>
</div>

<?php include "include/script.php"; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
