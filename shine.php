<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Wisata</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Netflix+Sans:wght@700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Arial', sans-serif;
            margin: 0;
        }

        header {
            background-color: #141414;
            padding: 20px;
            text-align: left;
            color: #fff;
            font-family: 'Netflix Sans', sans-serif;
            font-size: 2rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        header h1 {
            margin: 0; /* Remove default margin on h1 */
        }

        header a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        header i {
            font-size: 1.5rem;
            margin-right: auto; /* Move icon to the right */
        }

        main {
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            cursor: pointer;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .gallery img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .gallery img:hover {
            transform: scale(1.1);
        }

        .destination-title {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        footer {
            background-color: #141414;
            padding: 10px;
            text-align: center;
            color: #fff;
        }
    </style>
</head>

<body>

    <header>
        <a href="index2-.php">
            <i class="fas fa-home"></i>
        </a>
        <h1>Photo Destinasi</h1>
    </header>

    <main class="container">
    <?php
include "include/include.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $id_shine = $_POST['id_shine'];
    $nama = $_POST['nama'];
    $gambar = $_POST['gambar'];

    // Insert data into the database
    $sql = "INSERT INTO shine (id_shine, nama, gambar) VALUES ('$id_shine', '$nama', '$gambar')";
    $result = mysqli_query($connection, $sql);

    // Check if the query was successful
    if ($result) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

// Query untuk mendapatkan data destinasi dari database
$queryDestinasi = "SELECT * FROM shine";
$resultDestinasi = $connection->query($queryDestinasi);

// Membuat array untuk menampung data destinasi
$destinasiData = array();
while ($row = $resultDestinasi->fetch_assoc()) {
    $destinasiData[$row['nama']][] = $row['gambar'];
}

// Tutup koneksi
$connection->close();

foreach ($destinasiData as $destinasi => $foto):
?>
    <div class="card">
        <div class="card-body">
            <div class="destination-title"><?= ucwords($destinasi) ?> Destinasi</div>
            <div class="row gallery">
                <?php foreach ($foto as $namaFoto): ?>
                    <div class="col-md-3">
                        <img src="../images/<?= $namaFoto ?>" alt="<?= ucwords($destinasi) ?>" class="img-thumbnail">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
    </main>

    <footer>
        <p>&copy; 2023 Destinasi Wisata. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Tambahkan script JavaScript untuk efek geser
        $('.card').on('mousemove', function (e) {
            var card = $(this);
            var width = card.width();
            var height = card.height();
            var mouseX = e.pageX - card.offset().left;
            var mouseY = e.pageY - card.offset().top;
            var rotateX = (height / 2 - mouseY) / 10;
            var rotateY = (width / 2 - mouseX) / 10;
            card.css('transform', 'rotateX(' + rotateX + 'deg) rotateY(' + rotateY + 'deg)');
        });

        $('.card').on('mouseout', function () {
            $(this).css('transform', 'none');
        });
    </script>

</body>

</html>
