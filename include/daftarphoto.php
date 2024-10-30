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
            <form method="GET">
              <div class="form-group row mb-2">
                <label for="search" class="col-sm-3">Photo Destinasi </label>
                <div class="col-sm-6">
                  <input type="text" name="searchNama" class="form-control" id="search" value="<?php echo isset($_GET['searchNama']) ? $_GET['searchNama'] : ''; ?>" placeholder="photo destinasi">
                </div>
                <input type="submit" name="kirim" class="col-sm-1 btn-primary" value="search">
              </div>
            </form>
            <!-- end form pencarian -->

            <?php
            // Query untuk mengambil jumlah foto destinasi
            $queryCount = mysqli_query($connection, "SELECT COUNT(*) as total FROM fotodestinasi");
            $resultCount = mysqli_fetch_assoc($queryCount);
            $jumlah = $resultCount['total'];
            ?>

            <div class="col-xl-3 col-md-6">
              <div class="card bg-success text-white mb-4">
                <div class="card-body">Photodestinasi <?php echo $jumlah; ?></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="daftarphotodestinasi.php">View Details</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
              </div>
            </div>

            <table class="table table-hover table-dark">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Kode photo</th>
                  <th scope="col">Nama Photo Wisata</th>
                  <th scope="col">Photo Destinasi</th>
                  <th colspan="2" style="text-align: center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Kueri SQL dengan kondisi pencarian nama photo wisata
                $query = mysqli_query($connection, "SELECT * FROM fotodestinasi WHERE fotodestinasiNAMA LIKE '%$searchNama%'");

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
                    <td>
                      <a href="editphoto.php?ubah=<?php echo $row["fotodestinasiKODE"] ?>" class="btn btn-success btn-sm" title="edit">
                        Edit
                      </a>
                    </td>
                    <td>
                      <a href="hapusphoto.php?hapus=<?php echo $row["fotodestinasiKODE"]; ?>" class="btn btn-danger btn-sm" title="hapus">
                        Hapus
                      </a>
                    </td>
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
        placeholder: 'Pilih  Hotel'
      });
    });
  </script>
</body>

</html>
