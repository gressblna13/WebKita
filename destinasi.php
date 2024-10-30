<?php
include "include/include.php";

if (isset($_POST['Simpan'])) {
  $destinassiKODE = $_POST['kodedestinasi'];
  $destinassiNAMA = $_POST['namadestinasi'];
  $kategoriKODE = $_POST['kategoridestinasi'];
  $destinasiKET = $_POST['destinasiket'];

  // Handle file upload
  $destinasiFOTO = '';

  if (isset($_FILES['destinasifoto']) && $_FILES['destinasifoto']['error'] === 0) {
      $file_name = $_FILES['destinasifoto']['name'];
      $file_tmp = $_FILES['destinasifoto']['tmp_name'];

      move_uploaded_file($file_tmp, "path/to/uploaded/images/" . $file_name);

      $destinasiFOTO = $file_name;
  }

  mysqli_ping($connection);

  // Menggunakan prepared statement
  $stmt = mysqli_prepare($connection, "INSERT INTO destinasi VALUES (?, ?, ?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "sssss", $destinassiKODE, $destinassiNAMA, $kategoriKODE, $destinasiKET, $destinasiFOTO);

  // Eksekusi statement dan penanganan kesalahan
  if (mysqli_stmt_execute($stmt)) {
      echo "Data berhasil disimpan.";
  } else {
      echo "Error: " . mysqli_error($connection);
  }

  // Menutup statement
  mysqli_stmt_close($stmt);

  header("location:destinasi.php");
}

$datakategori = mysqli_query($connection, "SELECT * FROM kategoriwisata");
?>

 
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['useremail']))
        header ("location:login.php");
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
<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">
 
    <form method="post">
        <div class="mb-3 row">    
          <!-- mb=margin button" -->
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
          
          <div class="mb-3 row">
            <label for="namadestinasi" class="col-sm-2 col-form-label-"> destinasi ket</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="destinasiket" name="destinasiket" placeholder="Destinasi ket">
            </div>
</div>

<div class="mb-3 row">
  <label for="destinasifoto" class="col-sm-2 col-form-label">Foto destinasi</label>
  <div class="col-sm-10">
    <input type="file" class="form-control-file" id="destinasifoto" name="destinasifoto" accept="image/*">
  </div>
</div>

<script>
const foto = document.querySelector('#foto');

foto.addEventListener('change', (e) => {
  const file = e.target.files[0];
  const reader = new FileReader();

  reader.onload = (e) => {
    const data = e.target.result;

    // Proses file yang diupload
    console.log(data); // contoh: menampilkan data base64 di konsol
  };

  reader.readAsDataURL(file);
});
</script>


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
      <th scpe="col">Kode Kategori</th>
      <th scpe="col">Destinasi ket</th>
      <th scpe="col">destinasi foto</th>

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
      <td><?php echo $row ['destinasiKET'];?></td>
      <td><?php echo $row ['destinasiFOTO'];?></td>
    <td width ="5px">
      <a href="destinasiedit.php?ubah=<?php echo $row["destinasiKODE"]?>"
      class="btn btn-success btn-sm" tittle ="edit">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
       </td>

       <td width="5px">
    <a href="hapus.php?hapus=<?php echo $row["destinasiKODE"]; ?>" class="btn btn-danger btn-sm" title="hapus">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
        </svg>
    </a>
</td>

    </tr>
   
    <?php $nomor =$nomor + 1; ?>
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

</div> <!-- penutup class "col-sm-10" -->
</div> <!-- Penutup class row -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function() {
    // Kode jQuery Anda di sini
    $('#kodekategori').select2({
        closeOnSelect: true,
        allowClear: true,
        placeholder: 'Pilih kategori wisata'
    });
});
</script>
</body>
</html>