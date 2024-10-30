<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori Wisata</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<?php
include "include/config.php";

if (isset($_GET['ubah'])) {
    $kode_kategori = $_GET['ubah'];
    $query_edit = mysqli_query($connection, "SELECT * FROM kategoriwisata WHERE kategoriKODE='$kode_kategori'");
    $result = mysqli_fetch_array($query_edit);
}

if (isset($_POST['Update'])) {
    $kategoriNAMA = $_POST['inputKategoriNama'];
    $kategoriKET = $_POST['inputKategoriKeterangan'];
    $kategoriREFERENCE = $_POST['inputKategoriReference'];

    mysqli_query($connection, "UPDATE kategoriwisata SET kategoriNAMA='$kategoriNAMA', kategoriKET='$kategoriKET', kategoriREFERENCE='$kategoriREFERENCE' WHERE kategoriKODE='$kode_kategori'");
    header("location:kategoriwisata.php");
}
?>

<div class="container mt-5">
    <h2>Edit Kategori Wisata</h2>
    <form method="POST">
        <div class="form-group">
            <label for="kategoriNAMA">Nama Kategori Wisata</label>
            <input type="text" class="form-control" id="kategoriNAMA" name="inputKategoriNama" value="<?php echo $result['kategoriNAMA']; ?>" required>
        </div>
        <div class="form-group">
            <label for="kategoriKET">Keterangan Kategori Wisata</label>
            <input type="text" class="form-control" id="kategoriKET" name="inputKategoriKeterangan" value="<?php echo $result['kategoriKET']; ?>" required>
        </div>
        <div class="form-group">
            <label for="kategoriREFERENCE">Referensi Kategori Wisata</label>
            <input type="text" class="form-control" id="kategoriREFERENCE" name="inputKategoriReference" value="<?php echo $result['kategoriREFERENCE']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary" name="Update">Update</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
