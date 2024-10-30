<!DOCTYPE html>
<html>
<?php
include "include/include.php";

if (isset($_POST['Simpan'])) {
    $id_destinasi = $_POST['kodedestinasi'];
    $nama_destinasi = $_POST['namadestinasi'];

    // Perubahan pada variabel tujuan
    $tujuan = isset($_POST['kategori']) ? $_POST['kategori'] : '';

    // Perubahan untuk menghindari error
    $kategori = is_array($tujuan) ? implode(",", $tujuan) : '';

    mysqli_query($connection, "INSERT INTO destinasitravel VALUES ('$id_destinasi', '$nama_destinasi', '$tujuan', '$kategori')");
}

// Handle query pencarian
$pencarian = isset($_GET['search']) ? $_GET['search'] : '';

// Modifikasi query SQL untuk mencakup kondisi pencarian
$query = "SELECT * FROM destinasitravel";
if (!empty($pencarian)) {
    $query .= " WHERE nama_destinasi LIKE '%$pencarian%'";
}

$data1kategori = mysqli_query($connection, "select * from kategoriwisata");
$datakategori = mysqli_query($connection, $query);
?>
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
                <head>
                    <title>Form Travel</title>
                    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
                    <style>
                        /* CSS kustom untuk meletakkan form di tengah */
                        .center-form {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            height: 100vh;
                        }

                        #form {
                            background-color: #fdf5e6;
                            padding: 20px;
                            border-radius: 10px;
                        }

                        /* CSS untuk tabel berwarna pink dengan ujung melengkung */
                        #tabelDestinasi {
                            background-color: #ffc0cb;
                            border-collapse: separate;
                            border-spacing: 0;
                            border-radius: 10px;
                            overflow: hidden;
                            margin-top: 20px;
                        }

                        #tabelDestinasi th,
                        #tabelDestinasi td {
                            padding: 8px;
                            text-align: center;
                            border: 1px solid #ccc;
                        }

                        #tabelDestinasi th {
                            background-color: #f2f2f2;
                        }
                    </style>
                </head>

                <body>
                    <div class="container mt-4 center-form">
                        <div class="col-md-8">
                            <h2 class="mb-4">Travel</h2>
                            <form action="" method="post" id="formDestinasi" class="mb-4">
                                <div class="form-group">
                                    <label for="kodedestinasi">Kode Travel</label>
                                    <input type="text" class="form-control" id="kodedestinasi" name="kodedestinasi" required>
                                </div>
                                <div class="form-group">
                                    <label for="namadestinasi">Lokasi Travel</label>
                                    <input type="text" class="form-control" id="namadestinasi" name="namadestinasi" required>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="reguler" name="kategori[]" value="reguler">
                                        <label class="form-check-label" for="reguler">Reguler</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="classic" name="kategori[]" value="classic">
                                        <label class="form-check-label" for="classic">Classic</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="vip" name="kategori[]" value="vip">
                                        <label class="form-check-label" for="vip">VIP</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tujuan" class="form-label">Tujuan</label>
                                    <select class="form-control" id="tujuan" name="tujuan">
                                        <option value="Flocation">Flocation</option>
                                        <option value="Staycation">Staycation</option>
                                        <option value="Cinetourism">Cinetourism</option>
                                        <option value="Digital Detox">Digital Detox</option>

                                        <?php while ($row = mysqli_fetch_array($data1kategori)) { ?>
                                            <option value="<?php echo $row["kategoriKODE"] ?>">
                                                <?php echo $row["kategoriKODE"] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
                            </form>

                            <!-- Form pencarian -->
                            <form action="" method="get" class="mb-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari..." name="search">
                                    <button type="submit" class="btn btn-secondary">Cari</button>
                                </div>
                            </form>

                            <table class="table" id="tabelDestinasi">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode travel</th>
                                        <th scope="col">lokasi travel</th>
                                        <th scope="col">tujuan</th>
                                        <th scope="col">kategori</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($datakategori)) {
                                        echo "<tr>";
                                        echo "<td>{$row['id_destinasi']}</td>";
                                        echo "<td>{$row['nama_destinasi']}</td>";
                                        echo "<td>{$row['tujuan']}</td>";
                                        echo "<td>{$row['kategori']}</td>";
                                        echo "<td>
                                            <a href='edittravel.php?ubah={$row["id_destinasi"]}' class='btn btn-success btn-sm' title='Edit'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                                </svg>
                                            </a>
                                            <a href='hapustravel.php?hapus={$row["id_destinasi"]}' class='btn btn-danger btn-sm' title='Hapus'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Z'/>
                                                    <path d='M2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Zm3 .5a.5.5 0 0 1 1 0v6a.5.5 0 0 1-1 0V6Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Zm3 .5a.5.5 0 0 1 1 0v6a.5.5 0 0 1-1 0V6Z'/>
                                                    <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/>
                                                </svg>
                                            </a>
                                        </td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php include "include/footer.php";?>
                  
                  <?php include "include/script.php";?>
                        </div>
                    </div>


                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                    <script>
                        function simpanData() {
                            // Dapatkan data formulir
                            var formData = $("#formDestinasi").serialize();

                            // Kirim permintaan AJAX untuk memperbarui tabel
                            $.ajax({
                                type: "POST",
                                url: "update_table.php", // Buat file PHP terpisah untuk menangani permintaan AJAX
                                data: formData,
                                success: function (response) {
                                    // Perbarui tabel dengan data baru
                                    $("#tabelDestinasi tbody").append(response);
                                }
                            });
                        }
                    </script>

                   
                </div>
                
            </div>
     
        </div>
    </div> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src=""></script>
    </div> 
    </div> 


    </body>
</html>
