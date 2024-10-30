<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Restaurant</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
</head>
<?php include "include/head.php"; ?>
    <body class="sb-nav-fixed">
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
    <?php
    include 'include/include.php';
    ob_start();
    session_start();
    if (!isset($_SESSION['useremail'])) {
        header("location:login.php");
    }
    ?>
    <?php include "include/include.php"; ?>
    <?php
    if (isset($_GET['ubah'])) {
        $kodeToUpdate = $_GET['ubah'];
        $result = mysqli_query($connection, "SELECT * FROM restaurant WHERE pelanggan_id = '$kodeToUpdate'");
        $data = mysqli_fetch_array($result);
    }

    if (isset($_POST['Update'])) {
        $pelanggan_id = $_POST['pelanggan_id'];
        $nama_menu = $_POST['nama_menu'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        // Perbarui query menggunakan prepared statement untuk menghindari SQL injection
        $updateQuery = "UPDATE restaurant SET pelanggan_id = ?, nama_menu = ?, category = ?, description = ?, price = ? WHERE pelanggan_id = ?";
        $stmt = mysqli_prepare($connection, $updateQuery);
        mysqli_stmt_bind_param($stmt, 'ssssss', $pelanggan_id, $nama_menu, $category, $description, $price, $pelanggan_id);
        mysqli_stmt_execute($stmt);

        header("location:restaurant.php");
    }

    if (isset($_POST['Update'])) {
        // Tambahkan logika untuk "Simpan Edit" di sini
        // Form ini terpisah untuk menangani Simpan Edit
    }
    ?>

    <form method="POST">
        <!-- Field formulir Anda... -->

        <div class="mb-3">
            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <input type="submit" name="Update" value="Update" class="btn btn-primary">
                    <a href="restaurant.php" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </div>
    </form>

    <form method="POST">
        <div class="mb-3">
            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <button type="submit" name="SimpanEdit" class="btn btn-success">Simpan Edit</button>
                    <a href="restaurant.php" class="btn btn-secondary">Batal Edit</a>
                </div>
            </div>
        </div>
    </form>

    </div>
    <?php include "include/footer.php";?>
</div>
</div>
<?php include "include/script.php";?>       
    </div> <!-- penutup class "col-sm-10" -->
</div> <!-- Penutup class row -->
<!-- ini untuk js nya select2 -->

</div> <!-- penutup class "col-sm-10" -->
</div> <!-- Penutup class row -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src=""></script>
 
</body>

</html>
