<!DOCTYPE html>
<html lang="en">

<?php
include "include/include.php";

if (isset($_POST['Simpan'])) {
    $hotel0160 = $_POST['hotel0160'];
    $hotelNAMA = $_POST['hotelNAMA'];
    $hotelALAMAT = $_POST['hotelALAMAT'];
    $kategori0160 = $_POST['kategori0160'];
    mysqli_query($connection, "INSERT INTO grasyahotel VALUES ('$hotel0160','$hotelNAMA','$hotelALAMAT','$kategori0160')");
    header("location:grasyahotel.php");
}

// Query untuk mengambil data
if (isset($_POST["kirim_nama"])) {
    $search_nama = $_POST['search_nama'];
    $query = mysqli_query($connection, "SELECT * FROM grasyahotel WHERE hotelNAMA LIKE '%$search_nama%'");
} elseif (isset($_POST["kirim_alamat"])) {
    $search_alamat = $_POST['search_alamat'];
    $query = mysqli_query($connection, "SELECT * FROM grasyahotel WHERE hotelALAMAT LIKE '%$search_alamat%'");
} else {
    $query = mysqli_query($connection, "SELECT * FROM grasyahotel");
}

include "include/head.php";
?>

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

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <form method="POST">
                        <!-- Form for adding a new hotel -->
                        <div class="mb-3 row">
                            <label for="hotel_kode" class="col-sm-2 col-form-label">Kode Hotel</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="hotel_kode" name="hotel0160" placeholder="Kode Hotel">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="hotel_nama" class="col-sm-2 col-form-label">Nama Hotel</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="hotel_nama" name="hotelNAMA" placeholder="Nama Hotel">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="hotel_alamat" class="col-sm-2 col-form-label">Alamat Hotel</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="hotel_alamat" name="hotelALAMAT" placeholder="Alamat Hotel">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="hotel_kategori" class="col-sm-2 col-form-label">Kategori Hotel</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="hotel_kategori" name="kategori0160" placeholder="Kategori Hotel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
                                <input type="reset" class="btn btn-secondary" value="Batal" name="Batal">
                            </div>
                        </div>
                    </form>

                    <!-- Form for searching by hotel name -->
                    <form method="POST" style="margin-top: 20px;">
                        <div class="form-group row mb-2">
                            <label for="search_nama" class="col-sm-3">Cari Nama Hotel</label>
                            <div class="col-sm-6">
                                <input type="text" name="search_nama" class="form-control" id="search_nama" value="<?php echo isset($_POST['search_nama']) ? $_POST['search_nama'] : ''; ?>" placeholder="Cari Nama Hotel">
                            </div>
                            <input type="submit" name="kirim_nama" class="col-sm-1 btn-primary" value="Cari">
                        </div>
                    </form>

                    <!-- Display search results in a table -->
                    <div class="jumbotron mt-5">
                        <h1 class="display-5">Hasil entri data hotel grasya</h1>
                    </div>
                    <table class="table table-pink">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Hotel</th>
                                <th scope="col">Nama Hotel</th>
                                <th scope="col">Alamat Hotel</th>
                                <th scope="col">Kategori Hotel</th>
                                <th colspan="2" style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 1;
                            if ($query && mysqli_num_rows($query) > 0) {
                                while ($row = mysqli_fetch_array($query)) {
                            ?>
                                    <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $row['hotel0160']; ?></td>
                                        <td><?php echo $row['hotelNAMA']; ?></td>
                                        <td><?php echo $row['hotelALAMAT']; ?></td>
                                        <td><?php echo $row['kategori0160']; ?></td>
                                        <td width="5px">
                                            <a href="edithotel.php?ubah=<?php echo $row["hotel0160"] ?>" class="btn btn-success btn-sm" title="edit">Edit</a>
                                        </td>
                                        <td width="5px">
                                            <a href="hapushotel.php?hapus=<?php echo $row["hotel0160"] ?>" class="btn btn-danger btn-sm" title="hapus">Hapus</a>
                                        </td>
                                    </tr>
                            <?php
                                    $nomor = $nomor + 1;
                                }
                            } else {
                                echo '<tr><td colspan="6">Tidak ada data ditemukan</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-1"></div>
            </div>

            <?php include "include/footer.php"; ?>
            <?php include "include/script.php"; ?>
        </div>
    </div>
</body>

</html>
