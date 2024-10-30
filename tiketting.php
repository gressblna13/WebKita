<!DOCTYPE html>
<html lang="en">

<?php
include "include/include.php";
if (isset($_POST['Simpan'])) {
    $namaTIKET = $_POST['namaTIKET'];
    $kategoriTIKET = $_POST['kategoriTIKET'];
    $jumlahTIKET = $_POST['jumlahTIKET'];
    $tanggalTIKET = $_POST['tanggalTIKET'];

    $insert = mysqli_query($connection, "INSERT INTO tiketting (namaTIKET, kategoriTIKET, JumlahTIKET, tanggalTIKET) VALUES('$namaTIKET', '$kategoriTIKET', '$jumlahTIKET', '$tanggalTIKET')");

    header("location:tiketting.php");
}
?>
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

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Manajemen Tiket</title>
                <link rel="stylesheet" href="css/bootstrap.min.css">
                <style>
                    body {
                        background-color: #f8f9fa;
                    }

                    .container {
                        margin-top: 50px;
                    }

                    .jumbotron {
                        background-color: #343a40;
                        color: #ffffff;
                        margin-top: 20px;
                    }

                    table {
                        margin-top: 20px;
                    }
                </style>
            </head>

            <body>
                <div class="container mt-4 center-form">
                    <div class="col-md-8">
                        <h2 class="mb-4">Pemesanan Tiket</h2>
                        <div class="col-sm-12">
                            <form method="POST">
                                <div class="mb-3 row">
                                    <label for="hotel kode" class="col-sm-2 col-form-label">Nama Tiket</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="hotel kode" name="namaTIKET" placeholder="Nama Tiket">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="hotel nama" class="col-sm-2 col-form-label">Kategori Tiket</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="hotel nama" name="kategoriTIKET" placeholder="Kategori Tiket">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="hotel alamat" class="col-sm-2 col-form-label">Jumlah Tiket</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="hotel alamat" name="jumlahTIKET" placeholder="Jumlah Tiket">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="kode kategori" class="col-sm-2 col-form-label">Tanggal Tiket</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="kode kategori" name="tanggalTIKET" placeholder="Tanggal Tiket">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
                                        <input type="reset" class="btn btn-secondary" value="Batal" name="Batal">
                                    </div>
                                </div>

                                <!-- Kolom Pencarian -->
                                <div class="form-group row">
                                    <label for="search_nama" class="col-sm-2 col-form-label">Cari Tiket</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="search_nama" name="search_nama" placeholder="Nama Tiket">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="submit" class="btn btn-primary" value="Cari" name="kirim_nama">
                                    </div>
                                </div>
                                <!-- /Kolom Pencarian -->

                            </form>
                        </div>
                    </div>

                    <div class="jumbotron text-center p-2">
                        <h3 class="display-5">Entri Tiket Terbaru</h3>
                    </div>

                    <table class="table table-sm table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Tiket</th>
                                <th scope="col">Kategori Tiket</th>
                                <th scope="col">Jumlah Tiket</th>
                                <th scope="col">Tanggal Tiket</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST["kirim_nama"])) {
                                $search_nama = $_POST['search_nama'];
                                $query = mysqli_query($connection, "SELECT * FROM tiketting WHERE namaTIKET LIKE '%$search_nama%'");
                            } elseif (isset($_POST["kirim_alamat"])) {
                                $search_alamat = $_POST['search_alamat'];
                                $query = mysqli_query($connection, "SELECT * FROM tiketting WHERE kategoriTIKET LIKE '%$search_TIKET%'");
                            } else {
                                $query = mysqli_query($connection, "SELECT * FROM tiketting");
                            }

                            $nomor = 1;
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $nomor; ?></td>
                                    <td><?php echo $row['namaTIKET']; ?></td>
                                    <td><?php echo $row['kategoriTIKET']; ?></td>
                                    <td><?php echo $row['JumlahTIKET']; ?></td>
                                    <td><?php echo $row['tanggalTIKET']; ?></td>
                                    <td>
                                        <a href="hapustiket.php?hapus=<?php echo $row['namaTIKET']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus tiket ini?');">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                $nomor++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php include "include/footer.php"; ?>

                <?php include "include/script.php";?>
            </body>
        </div>
    </div>
</html>
