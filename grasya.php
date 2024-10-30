<?php
include "include/include.php";

ob_start();
session_start();
if (!isset($_SESSION['useremail'])) {
    header("location:login.php");
}

if (isset($_POST['Simpan'])) {
    $grasya_id = $_POST['grasya_id'];
    $grasya_kota = $_POST['grasya_kota'];
    $kategoriKODE = $_POST['kategoridestinasi'];

    // Menggunakan prepared statement
    $stmt = mysqli_prepare($connection, "INSERT INTO pesonajawa VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $grasya_id, $grasya_kota, $kategoriKODE);

    // Eksekusi statement dan penanganan kesalahan
    if (mysqli_stmt_execute($stmt)) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    // Menutup statement
    mysqli_stmt_close($stmt);

    // Mengambil data dari tabel destinasi
    $query_destinasi = mysqli_query($connection, "SELECT * FROM destinasi WHERE kategoriKODE = '$kategoriKODE'");
    $row_destinasi = mysqli_fetch_assoc($query_destinasi);

    // Jika ditemukan data di tabel destinasi, lanjutkan dengan memasukkan ke tabel pesonajawa
    if ($row_destinasi) {
        $kategoriKODE_destinasi = $row_destinasi['kategoriKODE'];

        // Menggunakan prepared statement untuk memasukkan ke tabel pesonajawa
        $stmt_pesonajawa = mysqli_prepare($connection, "INSERT INTO pesonajawa VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt_pesonajawa, "sss", $grasya_id, $grasya_kota, $kategoriKODE_destinasi);

        // Eksekusi statement dan penanganan kesalahan
        if (mysqli_stmt_execute($stmt_pesonajawa)) {
            echo "Data berhasil disimpan di tabel pesonajawa.";
        } else {
            echo "Error: " . mysqli_error($connection);
        }

        // Menutup statement pesonajawa
        mysqli_stmt_close($stmt_pesonajawa);
    }

    // Redirect ke halaman grasya.php
    header("location:grasya.php");
}

$datakategori = mysqli_query($connection, "SELECT * FROM pesonajawa");
?>

<!-- Sisipkan HTML dan PHP sesuai kebutuhan Anda di sini -->

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
<h3 class="mb-4 font-weight-bold">Grasya Kota</h3>
    <form method="post">
        <div class="mb-3 row">    
          <!-- mb=margin button" -->
            <label for="grasya_id" class="col-sm-2 col-form-label">grasya_ID</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="grasya_id" name="grasya_id" placeholder="Kode ID">
            </div>
          </div>
 
          <div class="mb-3 row">
            <label for="grasya_kota" class="col-sm-2 col-form-label-">Nama Kota</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="grasya_kota" name="grasya_kota" placeholder="Nama Kota">
            </div>
          </div>
 
          <div class="mb-3 row">
            <label for="kategoridestinasi" class="col-sm-2 col-form-label">Kode Kategori</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="kategoridestinasi" name="kategoridestinasi" placeholder="Kode Kategori">
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
<!-- membuat form pencarian -->
<form method="POST">
  <div class="form-group row mb-2">
    <label for="search" class="col-sm-3">Nama kota</label>
    <div class="col-sm-6">
      <input type="text" name="search" class="form-control" id="search"
      value="<?php if (isset($_POST['search'])) { echo $_POST['search']; } ?>"
      placeholder="cari nama kota">
    </div>
    <input type="submit" name="kirim" class="col-sm-1 btn-primary" value="search">
  </div>
</form>
<!-- end form pencarian -->
<h3 class="mb-4 font-weight-bold"> Hasil Grasya Kota</h3>
<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">grasya_id</th>
      <th scope="col">grasya_kota</th>
      <th scope="col">Kode Kategori</th>
      <th colspan ="2" stlye="text-align=center" >aksi</th>
  </thead>
  <tbody>
    <!-- menerima kiriman dari form untuk pencarian pada tabel -->
    <?php 
    if (isset($_POST["kirim"])) {
      $search = $_POST['search'];
      $query = mysqli_query($connection, "SELECT * FROM pesonajawa
                                         WHERE grasya_kota LIKE '%" . $search . "%'");
    } else {
      $query = mysqli_query($connection, "SELECT * FROM pesonajawa");
    }

    // end pencarian
    $nomor = 1;
    while ($row = mysqli_fetch_array($query)) {
    ?>
      <tr>
        <td><?php echo $nomor; ?></td>
        <td><?php echo $row['grasya_id']; ?></td>
        <td><?php echo $row['grasya_kota']; ?></td>
        <td><?php echo $row['kategoriKODE']; ?></td>
        <td width="5px">
    <a href="hapus.php?hapus=<?php echo $row["grasya_id"]; ?>" class="btn btn-danger btn-sm" title="hapus">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
        </svg>
      </tr>
      <?php $nomor = $nomor + 1; ?>
    <?php } ?>
  </tbody>
</table>

</div>
</div>
<?php include "include/footer.php";?>
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
        placeholder: 'Pilih kategori kota'
    });
});
</script>
</body>
</html>