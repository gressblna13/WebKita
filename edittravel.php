<?php
include "include/include.php";


// Pastikan variabel sudah didefinisikan
$id_destinasi = $nama_destinasi = $tujuan = $kategori = '';

if (isset($_GET['ubah'])) {
    $id_destinasi = $_GET['ubah'];

    // Fetch the destination details based on the provided ID
    $result = mysqli_query($connection, "SELECT * FROM destinasitravel WHERE id_destinasi = '$id_destinasi'");

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $nama_destinasi = $row['nama_destinasi'];
        $tujuan = $row['tujuan'];
        $kategori = explode(',', $row['kategori']); // Ubah string kategori menjadi array
    } else {
        // Handle error if the query fails
        echo "Error fetching destination details: " . mysqli_error($connection);
    }
}


if (isset($_POST['Update'])) {
    // Get updated data from the form
    $id_destinasi = $_POST['id_destinasi'];
    $nama_destinasi = $_POST['namadestinasi'];
    $tujuan = $_POST['tujuan'];

    // Ambil kategori sebagai array
    $kategori = isset($_POST['kategori']) ? implode(",", $_POST['kategori']) : '';

    // Update the destination details in the database
    $update_query = "UPDATE destinasitravel SET 
                     nama_destinasi = '$nama_destinasi', 
                     tujuan = '$tujuan', 
                     kategori = '$kategori' 
                     WHERE id_destinasi = '$id_destinasi'";

    if (mysqli_query($connection, $update_query)) {
        header("Location: destinasitravel.php"); // Redirect to the main page after a successful update
        exit();
    } else {
        // Handle error if the update query fails
        echo "Error updating destination details: " . mysqli_error($connection);
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

<!DOCTYPE html>
<html>

<head>
    <title>Edit Destinasi Travel</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
  
    form {
      
        padding: 20px; 
        border-radius: 15px; 
    }
</style>
</head>

<body>
    <div class="container mt-4">
        <div class="col-md-8">
            <h2 class="mb-4">Edit Destinasi Travel</h2>
            <form action="" method="post" id="formEditDestinasi">
                <!-- Add a hidden input field to store the destination ID -->
                <input type="hidden" name="id_destinasi" value="<?php echo $id_destinasi; ?>">

                <div class="form-group">
                    <label for="namadestinasi">Nama Destinasi:</label>
                    <input type="text" class="form-control" id="namadestinasi" name="namadestinasi" value="<?php echo $nama_destinasi; ?>" required>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="reguler" name="kategori[]" value="reguler" <?php echo in_array('reguler', $kategori) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="reguler">Reguler</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="classic" name="kategori[]" value="classic" <?php echo in_array('classic', $kategori) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="classic">Classic</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="vip" name="kategori[]" value="vip" <?php echo in_array('vip', $kategori) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="vip">VIP</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tujuan" class="form-label">Tujuan</label>
                    <select name="tujuan" id="tujuan" class="form-select">
                        <option value="Flocation" <?php echo ($tujuan === 'Flocation') ? 'selected' : ''; ?>>Flocation</option>
                        <option value="Staycation" <?php echo ($tujuan === 'Staycation') ? 'selected' : ''; ?>>Staycation</option>
                        <option value="Cinetourism" <?php echo ($tujuan === 'Cinetourism') ? 'selected' : ''; ?>>Cinetourism</option>
                        <option value="Digital Detox" <?php echo ($tujuan === 'Digital Detox') ? 'selected' : ''; ?>>Digital Detox</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Update" name="Update">
                <a href="destinasitravel.php" class="btn btn-secondary mt-1">Kembali</a>
            </form>
            <?php include "include/footer.php";?>
<?php include "include/script.php";?>  
        </div>
    </div>
    
</div>
</div>     
    </div> <!-- penutup class "col-sm-10" -->
</div> <!-- Penutup class row -->
<!-- ini untuk js nya select2 -->

</div> <!-- penutup class "col-sm-10" -->
</div> <!-- Penutup class row -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src=""></script>
 

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
