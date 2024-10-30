<?php
include "include/config.php";

// Inisialisasi $row agar tidak terjadi warning
$row = array('fotodestinasiKODE' => '', 'fotodestinasiNAMA' => '', 'fotodestinasiFILE' => '');

if (isset($_GET['ubah'])) {
    $kodefoto = $_GET['ubah'];
    $query = mysqli_query($connection, "SELECT * FROM photodestinasi WHERE fotodestinasiKODE = '$kodefoto'");
    $row = mysqli_fetch_array($query);
}

if (isset($_POST['Update'])) {
    $kodefoto = $_POST['kodefoto'];
    $newKodeFoto = mysqli_real_escape_string($connection, $_POST['newkodefoto']);
    $namafoto = mysqli_real_escape_string($connection, $_POST['inputnama']);

    // File upload handling
    $namafile = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

    // Check file extension (case-insensitive)
    if (in_array(strtolower($ekstensifile), ['jpg'])) {
        move_uploaded_file($file_tmp, 'images/' . $namafile);

        // Update data in the database
        $update_query = "UPDATE photodestinasi SET fotodestinasiKODE = '$newKodeFoto', fotodestinasiNAMA = '$namafoto', fotodestinasiFILE = '$namafile' WHERE fotodestinasiKODE = '$kodefoto'";
        $result = mysqli_query($connection, $update_query);

        if ($result) {
            header("location: photodestinasi.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    } else {
        echo "Ekstensi file harus JPG atau jpg.";
    }
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
    <title>Edit Photo Destinasi Wisata</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>

    <div class="row">
        <div class="col-sm-1"></div>

        <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Edit Photo Destinasi Wisata</h1>
                </div>
            </div>

            <form method="POST" enctype="multipart/form-data" action="editphoto.php">
                <input type="hidden" name="kodefoto" value="<?php echo $row['fotodestinasiKODE']; ?>">

                <div class="form-group row">
                    <label for="newkodefoto" class="col-sm-2 col-form-label">Kode Photo Baru</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="newkodefoto" name="newkodefoto" value="<?php echo $row['fotodestinasiKODE']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="namafoto" class="col-sm-2 col-form-label">Nama Photo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="namafoto" name="inputnama" value="<?php echo $row['fotodestinasiNAMA']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="file" class="col-sm-2 col-form-label">Photo Wisata</label>
                    <div class="col-sm-10">
                        <img src="images/<?php echo $row['fotodestinasiFILE']; ?>" width="80">
                        <input type="file" id="file" name="file">
                        <p class="help-block">Field ini digunakan untuk unggah file</p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <input type="submit" name="Update" class="btn btn-primary" value="Update">
                        <a href="photodestinasi.php" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-sm-1"></div>
    </div>

    <?php include "include/footer.php"; ?>
</body>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</html>
