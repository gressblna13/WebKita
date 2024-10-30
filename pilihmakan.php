<?php
include "include/include.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan bahwa form telah disubmit

    // Ambil nilai jumlah makanan dari formulir
    $jumlah = $_POST['jumlah-makanan'];

    // Lakukan operasi lain sesuai kebutuhan, seperti menyimpan ke database

    // Contoh: Menyimpan ke database
    $stmt = mysqli_prepare($connection, "INSERT INTO restaurant (jumlah) VALUES (?)");
    mysqli_stmt_bind_param($stmt, 'i', $jumlah);
    mysqli_stmt_execute($stmt);

    // Redirect atau tampilkan pesan sukses, sesuai kebutuhan
    header("location: restaurant.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<?php include "include/head.php"; ?>

<body class="sb-nav-fixed">
    <?php include "include/navbar.php"; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "include/menunav.php"; ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Pilih Makanan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="fotorestaurant.php">Foto Restoran</a></li>
                        <li class="breadcrumb-item active">Pilih Makanan</li>
                    </ol>
                </div>
            </main>

            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-primary text-white text-center">
                                Form Pilih Makanan
                            </div>
                            <div class="card-body">
                                <form id="order-form-inner" action="pilihmakan.php" method="post">
                                    <div class="mb-3">
                                        <label for="jumlah-makanan" class="form-label">Jumlah Makanan:</label>
                                        <input type="number" name="jumlah-makanan" id="jumlah-makanan" class="form-control" required>
                                    </div>

                                    <button type="submit" class="btn btn-success">Pesan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "include/footer.php"; ?>
        </div>
    </div>

    <?php include "include/script.php"; ?>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
