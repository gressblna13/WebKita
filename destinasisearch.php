<!DOCTYPE html>
<!DOCTYPE html>
 
<html>
 
<?php
    include "include/include.php";
    if(isset($_POST['Simpan']))
    {
        $destinassiKODE = $_POST['kodedestinasi'];
        $destinassiNAMA = $_POST['namadestinasi'];
        $kategoriKODE = $_POST['kategoridestinasi'];
 
        mysqli_query($connection, "insert into destinasi values ('$destinassiKODE', '$destinassiNAMA', '$kategoriKODE')");
        header("location:destinasi.php");
    }
    $datakategori = mysqli_query ($connection, "select * from kategoriwisata");
?>
 
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
 
<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">
 
    <form method="post">
        <div class="mb-3 row">    <!-- mb=margin button" -->
            <label for="kodedestinasi" class="col-sm-2 col-form-label">Kode Destinasi</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="kodedestinasi" name="kodedestinasi" placeholder="Kode Destinasi">
            </div>
          </div>
 
          <div class="mb-3 row">
            <label for="namadestinasi" class="col-sm-2 col-form-label-">Nama Destinasi</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="namadestinasi" name="namadestinasi" placeholder="Nama Destinasi">
            </div>
          </div>
 
          <div class="mb-3 row">
            <label for="kategoridestinasi" class="col-sm-2 col-form-label">Kode Kategori</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="kategoridestinasi" name="kategoridestinasi" placeholder="Kode Kategori">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <div class="col-sm-7">
                <input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
                <input type="reset" class="btn btn-secondary" value="Batal" name="Batal">
            </div>
 
          </div>

          <!-- membuat form pencarian -->
<from method="POST">
  <div class="form-group row mb-2">
    <label for="serch" class="col-sm-3">Nama Destinasi</label>
    <div class ="col-sm-6">
      <input type="text" name="search" class="form-control" id="search"
      value="<?php if (isset ($_POST ['search'])) {echo $_POST ['search'];}?>"
      placeholder="cari nama destinasi">
  </div>
  <input type ="submit" name="kirim" class="col-sm-1 btn-primary" value="search">
  </div>

  </from>
<!-- and form pencarian-->

          <table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Destinasi</th>
      <th scope="col">Nama Destinasi</th>
      <th scope="col">Kode Kategori</th>
    </tr>
  </thead>
    </form>
<div class  ="jumbotrom mt -5">
    <h1 class=" display-5" >Hasil entri data destinasi wisata</h1>
</div>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Destinasi</th>
      <th scope="col">Nama Destinasi</th>
      <th scpe="col">Kode Kategori</th>
      <th colspan ="2" stlye="text-align=center" >aksi</th>
    </tr>
  </thead>
  <tbody>

    <!-- menerima kiriman dari form untuk penarian pada tabel -->
    <?php 
    if (isset($_POST ["kirim"]))
    {
      $search = $_POST ['search'];
      $query = mysqli_query ($connection,"select destinasi.* from destinasi 
      where destinasiNAMA like '%" .$search. "%'");
    } else 
    {
      $query = mysqli_query ($connection,"select destinasi.* from destinasi ");
      
    }

//end pencarian

 
       $nomor = 1;

       while ($row = mysqli_fetch_array($query))
       {
     ?>
    <tr>
      <td><?php echo $nomor;?></td>
      <td><?php echo $row ['destinasiKODE'];?></td>
      <td><?php echo $row['destinasiNAMA'];?></td>
      <td><?php echo $row ['kategoriKODE'];?></td>
    <td width ="5px">
      <a href="destinasiedit.php?ubah=<?php echo $row["destinasiKODE"]?>"
      class="btn btn-success btn-sm" tittle ="edit">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
       </td>
       <td width ="5px">
        <a href="destinasiedit.php?hapus=<?php echo $row["destinasiKODE"]?>"
        class = "btn btn-danger btn-sm" title="hapus">
       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
</svg>
       </td>
    </tr>
   
    <?php $nomor =$nomor + 1; ?>
      <?php
    } 
    ?>
  </tbody>
</table>
        
    </div> <!-- penutup class "col-sm-10" -->
</div> <!-- Penutup class row -->
<!-- ini untuk js nya select2 -->

</div> <!-- penutup class "col-sm-10" -->
</div> <!-- Penutup class row -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src=""></script>
 
<script>
    $(documents).ready(function()
    {
 
        $('#kodekategori').select2(
        {
            closeOnSelect: true,
            allowClear: true,
            placeholder: 'Pilih kategori wisata'    
        });
    });
</script>

</body>
</html>