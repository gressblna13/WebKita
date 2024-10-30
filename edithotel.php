<?php
include "include/include.php";

// Pastikan variabel sudah didefinisikan
$hotel0160 = $hotelNAMA = $hotelALAMAT = $kategori0160 = '';

if (isset($_GET['ubah'])) {
    $id_destinasi = $_GET['ubah'];

    // Ambil detail destinasi berdasarkan ID yang diberikan
    $result = mysqli_query($connection, "SELECT * FROM grasyahotel WHERE hotel0160 = '$id_destinasi'");

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $hotelNAMA = $row['hotelNAMA'];
        $hotelALAMAT = $row['hotelALAMAT'];
        $kategori0160 = $row['kategori0160'];
    } else {
        // Tangani kesalahan jika query gagal
        echo "Error fetching destination details: " . mysqli_error($connection);
    }
}

if (isset($_POST['Update'])) {
    // Get updated data from the form
    $hotel0160 = $_POST['hotel0160'];
    $hotelNAMA = $_POST['hotelNAMA'];
    $hotelALAMAT = $_POST['hotelALAMAT'];
    $kategori0160 = $_POST['kategori0160'];

    // Update detail destinasi di database
    $update_query = "UPDATE grasyahotel SET 
                     hotelNAMA = '$hotelNAMA', 
                     hotelALAMAT = '$hotelALAMAT',
                     kategori0160 = '$kategori0160' 
                     WHERE hotel0160 = '$hotel0160'";

    if (mysqli_query($connection, $update_query)) {
        header("Location: grasyahotel.php"); // Redirect ke halaman utama setelah pembaruan berhasil
        exit();
    } else {
        // Tangani kesalahan jika query pembaruan gagal
        echo "Error updating destination details: " . mysqli_error($connection);
    }
}
?>
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
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </main>
            <div class="container mt-4">
                <div class="col-md-8">
                    <h2 class="mb-4">Edit Grasya Hotel</h2>
                    <form action="" method="post" id="formEditDestinasi">
                        <!-- Tambahkan input tersembunyi untuk menyimpan ID destinasi -->
                        <input type="hidden" name="hotel0160" value="<?php echo $id_destinasi; ?>">

                        <div class="form-group">
                            <label for="hotelNAMA">Nama Hotel:</label>
                            <input type="text" class="form-control" id="hotelNAMA" name="hotelNAMA" value="<?php echo $hotelNAMA; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="hotelALAMAT">Alamat Hotel:</label>
                            <input type="text" class="form-control" id="hotelALAMAT" name="hotelALAMAT" value="<?php echo $hotelALAMAT; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="kategori0160">Kategori:</label>
                            <input type="text" class="form-control" id="kategori0160" name="kategori0160" value="<?php echo $kategori0160; ?>" required>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Update" name="Update">
                        <a href="grasyahotel.php" class="btn btn-secondary mt-1">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include "include/footer.php";?>
</div>
</div>
<?php include "include/script.php";?>       



</body>

</html>
