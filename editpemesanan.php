<?php
include "include/include.php";

// Periksa apakah parameter id telah diterima
if (isset($_GET['id'])) {
    $id_pembeli = $_GET['id'];

    // Ambil data pemesanan oleh-oleh berdasarkan ID dari database
    $query = "SELECT * FROM penjualanoleholeh WHERE id_pembeli = ?";
    
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $id_pembeli);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);

    // Periksa apakah data ditemukan
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $nama_pembeli = $row['nama_pembeli'];
        $pesanan = $row['pesanan'];
        $lokasi = $row['lokasi'];
        $gambar = $row['gambar'];
    } else {
        // Redirect ke halaman utama jika data tidak ditemukan
        header("Location: penjualanoleholeh.php");
        exit();
    }
} else {
    // Redirect ke halaman utama jika parameter id tidak diterima
    header("Location: penjualanoleholeh.php");
    exit();
}

// Proses form jika data dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $id_pembeli = $_POST['id_pembeli'];
    $nama_pembeli = $_POST['nama_pembeli'];
    $pesanan = $_POST['pesanan'];
    $lokasi = $_POST['lokasi'];

    // Mengelola file gambar yang diunggah
    $gambar = $_FILES['gambar']['name'];
    $gambar_temp = $_FILES['gambar']['tmp_name'];
    $gambar_path = "../images/" . $gambar;  // Ganti dengan direktori upload yang sesuai

    move_uploaded_file($gambar_temp, $gambar_path);

    // Update data pemesanan oleh-oleh ke dalam database
    $query = "UPDATE penjualanoleholeh SET nama_pembeli = ?, pesanan = ?, lokasi = ?, gambar = ? WHERE id_pembeli = ?";
    
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $nama_pembeli, $pesanan, $lokasi, $gambar, $id_pembeli);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Redirect ke halaman utama jika data berhasil diupdate
        header("Location: hasil_pemesanan.php");
        exit();
    } else {
        echo "Gagal melakukan pembaruan data.";
    }
}
?>

<?php include "include/head.php";?>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "include/menunav.php" ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Data Pemesanan Oleh-Oleh</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="penjualanoleholeh.php">Data Pemesanan</a></li>
                        <li class="breadcrumb-item active">Edit Data</li>
                    </ol>

                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_pembeli" value="<?php echo $id_pembeli; ?>">

                        <div class="form-group">
                            <label for="nama_pembeli">Nama Pembeli:</label>
                            <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" value="<?php echo $nama_pembeli; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="pesanan">Pesanan:</label>
                            <input type="text" class="form-control" id="pesanan" name="pesanan" value="<?php echo $pesanan; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="lokasi">Lokasi:</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?php echo $lokasi; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar:</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="penjualanoleholeh.php" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <?php include "include/script.php"; ?>
</body>

</html>
