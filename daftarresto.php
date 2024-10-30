<!DOCTYPE html>
<html>
<?php include "include/include.php"; ?>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
  <?php include "include/head.php"; ?>
  <body class="sb-nav-fixed">
    <?php include "include/navbar.php"; ?>
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
                <label for="search" class="col-sm-3">restaurant</label>
                <div class="col-sm-6">
                  <input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST['search'])) {echo $_POST['search'];}?>" placeholder="cari nama hotel">
                </div>
                <input type="submit" name="kirim" class="col-sm-1 btn-primary" value="search">
              </div>
            </form>
            <!-- end form pencarian -->
            <table class="table table-hover table-dark">
              <thead>
                <tr>
                  <th scope="col">pelanggan_id</th>
                  <th scope="col">Nama Menu</th>
                  <th scope="col">kategori</th>
                  <th scope="col">deskripsi</th>
                  <th scope="col">harga</th>
                  <th scope="col">gambar</th>
                 
                </tr>
              </thead>
              <tbody>
                <?php
                if (isset($_POST["kirim"])) {
                  $search = $_POST['search'];
                  $query = mysqli_query($connection, "select restaurant.* from restaurant where pelanggan_id like '%" . $search . "%'");
                } else {
                  $query = mysqli_query($connection, "select restaurant.* from restaurant");
                }
                $nomor = 1;
                while ($row = mysqli_fetch_array($query)) {
                ?>
                  <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $row['pelanggan_id']; ?></td>
                    <td><?php echo $row['nama_menu']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['images']; ?></td>
                  </tr>
                <?php
                  $nomor = $nomor + 1;
                }
                ?>
              </tbody>
            </table>
            <?php include "include/footer.php"; ?>
          </div>
        </div>
        <?php include "include/script.php"; ?>
      </div>
    </div>
    <!-- penutup class "col-sm-10" -->
  </div>
  <!-- Penutup class row -->
  <!-- ini untuk js nya select2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <script src=""></script>
  <script>
    $(document).ready(function() {
      $('#kodekategori').select2({
        closeOnSelect: true,
        allowClear: true,
        placeholder: 'Pilih  restaurant'
      });
    });
  </script>
</body>
</html>
