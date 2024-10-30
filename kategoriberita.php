<!doctype html>
<?php
include "include/include.php";
if (isset ($_POST['Simpan']))
{
    $kategoriberitaKODE = $_POST['inputkategorikode'];
    $kategoriberitaNAMA = $_POST['inputkategoriNama'];
    $kategoriberitaKET = $_POST['inputkategoriket'];

    mysqli_query($connection,"INSERT INTO kategoriberita VALUES ('$kategoriberitaKODE','$kategoriberitaNAMA', '$kategoriberitaKET')");
    header ("location:kategoriberita.php");

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
  <div class="col-sm-6"></div>
<div class="col-sm-20"></div>

  <div class="form-group row">
    <h3 style="margin-left: 30px; background-color:pink;" > ENTRY DATA KATEGORI BERITA<h3>
</div>

  <div class="col-sm-2"></div>
<div class="col-sm-20"></div>

  <form method = "POST"> 

  <div class="form-group row"style="margin-left: 20px;">

    <label for="kategoriKODE" class="col-sm-2 col-form-label">Kode Kategori Berita</label>

    <div class="col-sm-7">

      <input type="text" class="form-control" id="kategoriKODE" name="inputkategorikode" placeholder="Kode Kategori Berita">

    </div>

  </div>

 

  <div class="form-group row"style="margin-left: 20px;">

    <label for="kategoriNAMA" class="col-sm-2 col-form-label">Nama Kategori Berita</label>

    <div class="col-sm-7">

      <input type="text" class="form-control" id="kategoriNAMA" name="inputkategoriNama" placeholder="Inputkan nama Kategori Berita">

    </div>

  </div>

 

  <div class="form-group row" style="margin-left: 20px;">

    <label for="kategorKET" class="col-sm-2 col-form-label">Keterangan Kategori Berita</label>

    <div class="col-sm-7">

      <input type="text" class="form-control" id="kategoriNAMA" name="inputkategoriket" placeholder="Keterangan Kategori Berita">

    </div>

  </div>

 

<div class="tombol" style="margin-left: 260px;">
 <input class="btn btn-primary" type="submit" value ="Simpan" name ="Simpan">
 <input class="btn btn-primary" type="reset" value = "reset">
</div>
</form>

<!-- ini akhir pekerjaan kita-->

    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  </body>
</html>