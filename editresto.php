<?php
include "include/include.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Update'])) {
    $pelanggan_id = $_POST['pelanggan_id'];
    $nama_menu = $_POST['namamenu'];
    $category = $_POST['categorymenu'];
    $description = $_POST['descriptionmenu'];
    $price = $_POST['price'];

    // Periksa apakah file diunggah
    if ($_FILES['image']['error'] == 0) {
        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        // Pindahkan berkas yang diunggah ke tujuan
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
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

    $stmt = mysqli_prepare($connection, "UPDATE restaurant SET nama_menu=?, category=?, description=?, price=?, images=? WHERE pelanggan_id=?");

    mysqli_stmt_bind_param($stmt, 'ssssds', $nama_menu, $category, $description, $price, $images, $pelanggan_id);

    mysqli_stmt_execute($stmt);

    header("location: restaurant.php");
    exit();
}

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $query = "SELECT * FROM restaurant WHERE pelanggan_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 's', $edit_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Mulai Form Edit
        ?>
        <?php include "include/head.php"; ?>
        </head>

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
                        <h2 class="text-center mb-4">EDIT MENU</h2>

                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header bg-warning text-white text-center">
                                        Form Edit Menu
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="pelanggan_id" value="<?php echo $row['pelanggan_id']; ?>">

                                            <div class="mb-3">
                                                <label for="namamenu" class="form-label">Nama Menu:</label>
                                                <input type="text" name="namamenu" class="form-control" value="<?php echo $row['nama_menu']; ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="categorymenu" class="form-label">Kategori:</label>
                                                <select name="categorymenu" id="categorymenu" class="form-select">
                                                    <option value="Appetizer" <?php echo ($row['category'] == 'Appetizer') ? 'selected' : ''; ?>>Appetizer</option>
                                                    <option value="Main Dish" <?php echo ($row['category'] == 'Main Dish') ? 'selected' : ''; ?>>Main Dish</option>
                                                    <option value="Dessert" <?php echo ($row['category'] == 'Dessert') ? 'selected' : ''; ?>>Dessert</option>
                                                    <option value="Drink" <?php echo ($row['category'] == 'Drink') ? 'selected' : ''; ?>>Drink</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="descriptionmenu" class="form-label">Deskripsi:</label>
                                                <textarea name="descriptionmenu" class="form-control"><?php echo $row['description']; ?></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="price" class="form-label">Harga:</label>
                                                <input type="number" name="price" class="form-control" value="<?php echo $row['price']; ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="images" class="form-label">Images</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>

                                            <button type="submit" name="Update" class="btn btn-warning">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        // Selesai Form Edit
    } else {
        echo "Data not found.";
    }

    mysqli_stmt_close($stmt);
}
?>
  </div>

<?php include "include/footer.php"; ?>
</div>
</div>
     <?php include "include/script.php"; ?>
            
        </body>

        </html>
