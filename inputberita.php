<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Berita</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body class="sb-nav-fixed">
    <?php include "include/head.php"; ?>
    <?php include "include/navbar.php"; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "include/menunav.php"; ?>
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
            <body>
                <div class="container">
                    <h1 class="text-center">Input Berita</h1>
                    <form id="beritaForm" action="proses_input_berita.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="judul">Judul Berita:</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>

                        <div class="form-group">
                            <label for="konten">Konten Berita:</label>
                            <textarea class="form-control" id="konten" name="konten" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar Berita:</label>
                            <input type="file" class="form-control-file" id="gambar" name="gambar" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Berita</button>
                    </form>
                </div>

                <!-- Tambahkan Bootstrap JS dan Popper.js (diperlukan untuk Bootstrap) -->
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                <!-- Tambahkan JavaScript kustom untuk validasi formulir (bisa diperbarui lebih lanjut) -->
                <script>
                    document.getElementById('beritaForm').addEventListener('submit', function (event) {
                        var judul = document.getElementById('judul').value;
                        var konten = document.getElementById('konten').value;
                        var gambar = document.getElementById('gambar').value;

                        if (judul.trim() === '' || konten.trim() === '' || gambar.trim() === '') {
                            event.preventDefault();
                            alert('Harap isi semua field!');
                        } else {
                            // Formulir valid, lanjutkan dengan pengalihan halaman
                            window.location.href = 'proses_input_berita.php';
                        }
                    });
                </script>
                <?php include "include/footer.php"; ?>
            </div>
        </div>
        <?php include "include/script.php"; ?>
    </body>
</html>
