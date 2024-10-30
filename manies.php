<!DOCTYPE html>
<?php
include "include/include.php";
if (isset ($_POST['Simpan']))
{
    $kategoriKODE = $_POST['inputkategorikode'];
    $kategoriNAMA = $_POST['inputkategoriNama'];
    $kategoriKET = $_POST['inputkategoriket'];
    $kategoriREFERENCE = $_POST['inputkategorireference'];
    $query = "INSERT INTO kategoriwisata VALUES ('$kategoriKODE','$kategoriNAMA', '$kategoriKET','$kategoriREFERENCE')";
    mysqli_query($connection,$query);
    header ("location:manies.php");

}
?>

<html lang="en">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

 

    <title>Web Development kls C </title>

  </head>

  <body>

 

  <!--ini bagian kerja kita -->

  <div class="col-sm-2"></div>
<div class="col-sm-10"></div>

  <form method = "POST"> 

  <div class="form-group row">

    <label for="kategoriKODE" class="col-sm-2 col-form-label">Kode Kategori Wisata</label>

    <div class="col-sm-7">

      <input type="text" class="form-control" id="kategoriKODE" name="inputkategorikode" placeholder="Kode Kategori WIsata">

    </div>

  </div>

 

  <div class="form-group row">

    <label for="kategoriNAMA" class="col-sm-2 col-form-label">Nama Kategori Wisata</label>

    <div class="col-sm-7">

      <input type="text" class="form-control" id="kategoriNAMA" name="inputkategoriNama" placeholder="Inputkan nama Kategori WIsata">

    </div>

  </div>

 

  <div class="form-group row">

    <label for="kategorKET" class="col-sm-2 col-form-label">Keterangan Kategori Wisata</label>

    <div class="col-sm-7">

      <input type="text" class="form-control" id="kategoriNAMA" name="inputkategoriket" placeholder="Keterangan Kategori WIsata">

    </div>

  </div>

 

  <div class="form-group row">

    <label for="kategoriREFERENCE" class="col-sm-2 col-form-label">Referensi Kategori Wisata</label>

    <div class="col-sm-7">

      <input type="text" class="form-control" id="kategoriNAMA" name="inputkategorireference" placeholder="Referensi Kategori WIsata">

    </div>

  </div>

 <input class="btn btn-primary" type="submit" value ="Simpan" name ="Simpan">
 <input class="btn btn-primary" type="reset" value = "reset">

</form>

<!-- ini akhir pekerjaan kita-->

    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  </body>
</html>