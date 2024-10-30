<!DOCTYPE html>
<html>

<?php
    include "include/include.php";
?>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <!-- membuat form pencarian -->
                        <form method="POST">
                            <div class="form-group row mb-2">
                                <label for="search" class="col-sm-3">Daftar Photo</label>
                                <div class="col-sm-6">
                                    <input type="text" name="search" class="form-control" id="search"
                                        value="<?php if (isset($_POST['search'])) {echo $_POST['search'];}?>"
                                        placeholder="cari tiket">
                                </div>
                                <input type="submit" name="kirim" class="col-sm-1 btn-primary" value="search">
                            </div>
                        </form>
                        <!-- end form pencarian -->
                        <table class="table table-hover table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode photo</th>
                                    <th scope="col">Nama Photo wisata</th>
                                    <th scope="col">Photo Destinasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- menerima kiriman dari form untuk penarian pada tabel -->
                                <?php
                                if (isset($_POST["kirim"])) {
                                    $search = $_POST['search'];
                                    $query = mysqli_query($connection, "select fotodestinasi.* from fotodestinasi where fotodestinasiNAMA like '%" . $search . "%'");
                                } else {
                                    $query = mysqli_query($connection, "select fotodestinasi.* from fotodestinasi ");
                                }
                                // end pencarian
                                $nomor = 1;
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $nomor; ?></td>
                                    <td><?php echo $row['fotodestinasiKODE']; ?></td>
                                    <td><?php echo $row['fotodestinasiNAMA']; ?></td>
                                    <td><?php echo $row['fotodestinasiFILE']; ?></td>
                                </tr>
                                <?php $nomor = $nomor + 1; ?>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
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
                    placeholder: 'Pilih kategori wisata'
                });
            });
        </script>
    </body>
</html>
