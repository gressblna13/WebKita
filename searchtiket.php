<?php
include "include/include.php";

if (isset($_POST["kirim_nama"])) {
    $search_nama = $_POST['search_nama'];
    $query = mysqli_query($connection, "SELECT * FROM tiketting WHERE namaTIKET LIKE '%$search_nama%'");
} else {
    // Redirect to tiketting.php if accessed directly without search parameter
    header("Location: tiketting.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

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
                    <h1 class="mt-4">Pencarian Tiket</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="tiketting.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pencarian Tiket</li>
                    </ol>
                </div>
            </main>

            <div class="container mt-4">
                <h2>Hasil Pencarian Tiket</h2>

                <table class="table table-sm table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Tiket</th>
                            <th scope="col">Kategori Tiket</th>
                            <th scope="col">Jumlah Tiket</th>
                            <th scope="col">Tanggal Tiket</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $row['namaTIKET']; ?></td>
                                <td><?php echo $row['kategoriTIKET']; ?></td>
                                <td><?php echo $row['JumlahTIKET']; ?></td>
                                <td><?php echo $row['tanggalTIKET']; ?></td>
                                <td>
                                    <a href="hapustiket.php?hapus=<?php echo $row['namaTIKET']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus tiket ini?');">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            $nomor++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <?php include "include/footer.php"; ?>
            <?php include "include/script.php";?>
        </div>
    </div>
</body>
</html>
