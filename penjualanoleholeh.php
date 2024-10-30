<!DOCTYPE html>
<html>

<?php
include "include/include.php";

if (isset($_POST['Simpan'])) {
    $id_pembeli = $_POST['id_pembeli'];
    $nama_pembeli = $_POST['nama_pembeli'];
    $produk = $_POST['produk'];
    
    // Penanganan unggah berkas
    $namafile = $_FILES['gambar']['name'];
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

    // Periksa ekstensi berkas (case-insensitive)
    if (in_array(strtolower($ekstensifile), ['jpg'])) {
        $lokasi = '../images/'; // Ubah sesuai dengan direktori yang diinginkan
        $gambar = $namafile;

        // Pindahkan berkas yang diunggah ke folder yang diinginkan
        move_uploaded_file($file_tmp, $lokasi . $namafile);

        // Tetapkan lokasi dan gambar sesuai dengan path tempat berkas diunggah
        mysqli_query($connection, "INSERT INTO penjualanoleholeh (id_pembeli, nama_pembeli, pesanan, lokasi, gambar) VALUES ('$id_pembeli', '$nama_pembeli', '$produk', '$lokasi', '$gambar')");
    } else {
        echo "Ekstensi berkas harus JPG atau jpg.";
    }
}
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
<body>
    <div class="container mt-5">
        <h2>Form Pemesanan Oleh-Oleh</h2>
        <form action="penjualanoleholeh.php" method="post">

            <div class="form-group">
                <label for="id_pembeli">No Pembeli:</label>
                <input type="text" class="form-control" id="id_pembeli" name="id_pembeli" required>
            </div>

            <div class="form-group">
                <label for="nama_pembeli">Nama Pembeli:</label>
                <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" required>
            </div>

            <div class="form-group">
    <label for="lokasi">Gambar:</label>
    <input type="file" class="form-control" id="gambar" name="gambar" accept="..images.jpg" required>
</div>



            <h3>Pesanan</h3>

            <div class="form-group">
                <label for="produk">Produk:</label>
                <select class="form-control" id="produk" name="produk" required>
                    <!-- Tambahkan opsi untuk memilih produk -->
                    <option value="putu_mayang">Putu Mayang</option>
                    <option value="kue_kembang_goyang">Kue Kembang Goyang</option>
                    <option value="roti_buaya">Roti Buaya</option>
                    <option value="telur_gabus_keju">Telur Gabus Keju</option>
                    <option value="kue_semprong">Kue Semprong</option>
                    <option value="tape_uli">Tape Uli</option>
                </select>
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" max="1000" required>
            </div>

            <div class="d-flex justify-content-between">
    <div class="form-group">
        <button type="submit" name="Simpan" class="btn btn-primary">Kirim Pesanan</button>
    </div>

    <div class="form-group">
        <a href="hasil_pemesanan.php" class="btn btn-secondary mt-3">Lihat Data</a>
    </div>
</div>



        <hr>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

 <style>
    .custom-card {
        position: relative;
        height: 300px;
        border-radius: 10px;
        overflow: hidden;
    }

    .custom-card img {
        object-fit: cover;
        height: 60%;
        width: 100%;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .custom-card .card-body {
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        display: flex;
        flex-direction: column;
        padding: 1rem;
        height: 40%;
    }

    .custom-card .card-title {
        font-family: sans-serif;
        font-weight: bold;
        color: black; /* Mengubah warna judul menjadi hitam */
        margin-bottom: 0.5rem;
    }

    .custom-card .card-text {
        color: #282022;
        font-family: sans-serif;
        margin-bottom: 0.5rem;
    }

    .custom-card .produk-card {
        position: absolute;
        bottom: 0;
        right: 0; /* Menempatkan tombol di ujung kanan */
        display: flex;
        justify-content: space-between;
        padding: 0.5rem;
        background-color: rgba(255, 255, 255, 0.8);
    }

    .custom-card .btn {
        width: 30px;
        height: 30px;
        font-size: 14px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .custom-card:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        transition: box-shadow 0.3s ease;
    }
</style>


<div class="container mt-3">
    <h2 class="mb-3">Daftar Produk</h2>
    <div class="row">
        <!-- Kartu Produk 1 -->
        <div class="col-md-4 mb-4">
            <div class="card custom-card">
                <img src="../images/kue.jpg" class="card-img-top" alt="putu manyum">
                <div class="card-body">
                    <h5 class="card-title">Putu Manyum</h5>
                    <p class="card-text">Rp.40.000</p>
                    <div class="produk-card">
                        <div class="card-body">
                            <button type="button" class="btn btn-danger btn-hapus" data-id-div="1" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button type="button" class="btn btn-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kartu Produk 2 -->
        <div class="col-md-4 mb-4">
            <div class="card custom-card">
                <img src="../images/kue2.jpg" class="card-img-top" alt="Kue Kembang Goyang">
                <div class="card-body">
                    <h5 class="card-title">Kembang Goyang</h5>
                    <p class="card-text">Rp.30.000</p>
                    <div class="produk-card">
                        <div class="card-body">
                            <button type="button" class="btn btn-danger btn-hapus" data-id-div="2" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button type="button" class="btn btn-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kartu Produk 3 -->
        <div class="col-md-4 mb-4">
            <div class="card custom-card">
                <img src="../images/kue3.jpg" class="card-img-top" alt="Roti Buaya">
                <div class="card-body">
                    <h5 class="card-title">Roti Buaya</h5>
                    <p class="card-text">Rp.25.000</p>
                    <div class="produk-card">
                        <div class="card-body">
                            <button type="button" class="btn btn-danger btn-hapus" data-id-div="3" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button type="button" class="btn btn-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kartu Produk 4 -->
        <div class="col-md-4 mb-4">
            <div class="card custom-card">
                <img src="../images/kue4.jpg" class="card-img-top" alt="Telur Gabus Keju">
                <div class="card-body">
                    <h5 class="card-title">Telur Gabus Keju</h5>
                    <p class="card-text">Rp.20.000</p>
                    <div class="produk-card">
                        <div class="card-body">
                            <button type="button" class="btn btn-danger btn-hapus" data-id-div="4" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button type="button" class="btn btn-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kartu Produk 5 -->
        <div class="col-md-4 mb-4">
            <div class="card custom-card">
                <img src="../images/kue5.jpg" class="card-img-top" alt="Kue Semprong">
                <div class="card-body">
                    <h5 class="card-title">Kue Semprong</h5>
                    <p class="card-text">Rp.30.000</p>
                    <div class="produk-card">
                        <div class="card-body">
                            <button type="button" class="btn btn-danger btn-hapus" data-id-div="5" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button type="button" class="btn btn-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kartu Produk 6 -->
        <div class="col-md-4 mb-4">
            <div class="card custom-card">
                <img src="../images/kue66.jpg" class="card-img-top" alt="Tape Uli">
                <div class="card-body">
                    <h5 class="card-title">Tape Uli</h5>
                    <p class="card-text">Rp.35.000</p>
                    <div class="produk-card">
                        <div class="card-body">
                            <button type="button" class="btn btn-danger btn-hapus" data-id-div="6" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button type="button" class="btn btn-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                <script>
                    $(document).ready(function () {
                        // Menangani klik tombol hapus
                        $('.btn-hapus').on('click', function () {
                            var idDiv = $(this).data('id-div');

                            // Kirim permintaan AJAX untuk menghapus div
                            $.ajax({
                                type: 'POST',
                                url: 'hapusolehdiv.php',
                                data: { id_div: idDiv },
                                dataType: 'json',
                                success: function (response) {
                                    // Tampilkan pesan sukses atau gagal
                                    alert(response.message);

                                    // Jika penghapusan sukses, hapus div dari tampilan
                                    if (response.status === 'success') {
                                        // Cari dan hapus div berdasarkan id_div
                                        $('#div-' + idDiv).remove();
                                    }
                                },
                                error: function () {
                                    alert('Terjadi kesalahan saat menghapus div.');
                                }
                            });
                        });
                    });
                </script>
            </div>

            <?php include "include/footer.php";?>
        </div>
    </div>
    <?php include "include/script.php";?>
</body>

</html>