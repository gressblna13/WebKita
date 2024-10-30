<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOTO DESTINASI WISATA</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        .jumbotron {
            background-color: #f8f9fa;
            padding: 2rem 1rem;
            margin-bottom: 2rem;
        }

        .form-group.row {
            margin-bottom: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 0.5rem 1rem;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.25rem;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
        }

        .table {
            margin-top: 2rem;
        }

        .table tr:nth-child(odd) {
            background-color: #f9f9fa;
        }

        .img-thumbnail {
            width: 80px;
            height: auto;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
</head>

<?php
include "include/config.php";

if (isset($_POST['Simpan'])) {
    $kodefoto = $_POST['inputkode'];
    $namafoto = $_POST['inputnama'];

    $namafile = $_FILES['file']['name'];
    $file_tmp = $_FILES["file"]["tmp_name"];

    $ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

    // PERIKSA EKSTEN FILE HARUS JPG ATAU jpg
    if (($ekstensifile == "jpg") or ($ekstensifile == "JPG")) {
        move_uploaded_file($file_tmp, 'images/' . $namafile); //unggah file ke folder images
        mysqli_query($connection, "INSERT INTO photodestinasi VALUE ('$kodefoto', '$namafoto', '$namafile', '')");
        header("location:photodestinasi.php");
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

            <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-10">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-4">Input Photo Destinasi Wisata</h1>
                        </div>
                    </div>

                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="kodefoto" class="col-sm-2 col-form-label">Kode Photo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kodefoto" name="inputkode"
                                    placeholder="Kode Photo" maxlength="4">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="namafoto" class="col-sm-2 col-form-label">Nama Photo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namafoto" name="inputnama"
                                    placeholder="Nama Photo">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="file" class="col-sm-2 col-form-label">Photo Wisata</label>
                            <div class="col-sm-10">
                                <input type="file" id="file" name="file">
                                <p class="help-block">Field ini digunakan untuk unggah file</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <input type="submit" name="Simpan" class="btn btn-primary" value="Simpan">
                                <input type="submit" name="Batal" class="btn btn-secondary" value="Batal">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-sm-1"></div>
            </div>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <!-- Formulir Pencarian -->
                    <form method="GET">
                        <div class="form-group row">
                            <label for="searchNama" class="col-sm-2 col-form-label">Cari Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="searchNama" name="searchNama"
                                    placeholder="Cari Nama">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </form>


                    <table class="table table-hover table-danger">
                     <!-- Daftar Photo Destinasi Wisata -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Daftar Photo Destinasi Wisata</h1>
    </div>
</div>

<table class="table table-hover table-danger">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Kode Photo</th>
            <th>Nama Photo Wisata</th>
            <th>Photo Destinasi</th>
            <th colspan="2" style="text-align: center">Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $searchNama = isset($_GET['searchNama']) ? $_GET['searchNama'] : '';

        // Kueri SQL dengan kondisi pencarian nama photo wisata
        $query = mysqli_query($connection, "SELECT * FROM photodestinasi WHERE fotodestinasiNAMA LIKE '%$searchNama%'");

        $nomor = 1;
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $row['fotodestinasiKODE']; ?></td>
                <td><?php echo $row['fotodestinasiNAMA']; ?></td>
                <td>
                    <?php if (is_file("images/" . $row['fotodestinasiFILE'])) { ?>
                        <img src="images/<?php echo $row['fotodestinasiFILE'] ?>" width="80">
                    <?php } else
                        echo "<img src='images/noimage.png' width='80'>"
                    ?>
                </td>
                <td width="5px">
                    <a href="editphoto.php?ubah=<?php echo $row["fotodestinasiKODE"] ?>" class="btn btn-success btn-sm" title="edit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                    </a>
                </td>

                <td width="5px">
                    <a href="hapusphoto.php?hapus=<?php echo $row["fotodestinasiKODE"]; ?>" class="btn btn-danger btn-sm" title="hapus">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Z ///////////////////////////////////////////////////////////m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                        </svg>
                    </a>
                </td>
            </tr>
        <?php
            $nomor = $nomor + 1;
        }
        ?>
    </tbody>
</table>

                    </table>
                </div>

                <div class="col-sm-1"></div>
            </div>

            <?php include "include/footer.php";?>
        </div>
    </div>

    <?php include "include/script.php";?>

    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1"></script>
</body>

</html>
