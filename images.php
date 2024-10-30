<?php
// Koneksi ke database
$conn = new mysqli('pelanggan_id', 'nama_menu', 'category', 'description','price','images');

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil ID menu dari URL
$id = $_GET['pelanggan_id'];

// Ambil data menu dari database
$sql = "SELECT images FROM restaurant WHERE id=$pelangggan_id";
$result = $conn->query($sql);

// Ambil data dari database
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $images = $row['images'];
} else {
    echo "Tidak ada gambar yang ditampilkan";
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gambar Menu</title>
</head>

<body>
    <img src="path/to/your/images/<?php echo $images; ?>" alt="Menu Images" class="img-fluid">
</body>

</html>