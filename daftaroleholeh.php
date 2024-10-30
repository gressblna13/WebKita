<!DOCTYPE html>
<html>

<?php
include "include/include.php";
?>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        /* Menambahkan sedikit jarak di bagian atas elemen thead */
        table.table thead {
            margin-top: 10px;
        }

        /* Menambahkan sedikit border di ujung tabel */
        table.table {
            border-bottom: 2px solid #dee2e6;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>

<body>
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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="mb-0 font-weight-bold">Daftar Oleh Oleh</h3>
                            </div>
                            <div class="card-body">
                                <!-- membuat form pencarian -->
                                <form method="POST">
                                    <div class="form-group row mb-2">
                                        <label for="search" class="col-sm-3 col-form-label font-weight-bold">Cari Tiket</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="search" class="form-control" id="search"
                                                value="<?php if (isset($_POST['search'])) {echo $_POST['search'];}?>"
                                                placeholder="Masukkan kata kunci">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="submit" name="kirim" class="btn btn-primary" value="Search">
                                        </div>
                                    </div>
                                </form>
                                <!-- end form pencarian -->
                                <div class="table-responsive">
                                    <table class="table table-dark table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">id_pembeli</th>
                                                <th scope="col">nama_pembeli</th>
                                                <th scope="col">pesanan</th>
                                                <th scope="col">lokasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- menerima kiriman dari form untuk penarian pada tabel -->
                                            <?php
                                            if (isset($_POST["kirim"])) {
                                                $search = $_POST['search'];
                                                $query = mysqli_query($connection, "select penjualanoleholeh.* from penjualanoleholeh where id_pembeli like '%" . $search . "%'");
                                            } else {
                                                $query = mysqli_query($connection, "select penjualanoleholeh.* from penjualanoleholeh ");
                                            }
                                            // end pencarian
                                            $nomor = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $nomor; ?></td>
                                                <td><?php echo $row['id_pembeli']; ?></td>
                                                <td><?php echo $row['nama_pembeli']; ?></td>
                                                <td><?php echo $row['pesanan']; ?></td>
                                                <td><?php echo $row['lokasi']; ?></td>
                                            </tr>
                                            <?php $nomor = $nomor + 1; ?>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php include "include/footer.php";?>
                    </div>
                </div>
                <?php include "include/script.php";?>
            </div> <!-- penutup class "col-sm-10" -->
        </div> <!-- Penutup class row -->
        <!-- ini untuk js nya select2 -->
        <script>
            $(document).ready(function () {
                $('#kodekategori').select2({
                    closeOnSelect: true,
                    allowClear: true,
                    placeholder: 'Pilih oleh oleh '
                });
            });
        </script>
    </body>
</html>
