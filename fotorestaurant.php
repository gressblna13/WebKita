<!DOCTYPE html>
<html lang="id">

<?php include "include/head.php"; ?>

<body class="sb-nav-fixed">
    <?php include "include/navbar.php"; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "include/menunav.php"; ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dasbor</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dasbor</li>
                    </ol>
                </div>
            </main>

            <head>
                <title>Foto Restoran Ku</title>
                <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
                <style>
                    body {
                        background-color: #f8f9fa;
                        font-family: 'Arial', sans-serif;
                        margin: 0;
                        padding: 0;
                    }

                    .header {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        padding: 20px;
                        background-color: #343a40;
                        color: #ffffff;
                        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                    }

                    .header a {
                        color: #ffffff;
                        text-decoration: none;
                        margin-right: 15px;
                        font-weight: bold;
                    }

                    .header a:hover {
                        text-decoration: underline;
                    }

                    .container {
                        margin-top: 20px;
                    }

                    .photo-container {
                        display: flex;
                        justify-content: space-around;
                        flex-wrap: wrap;
                        margin-top: 20px;
                    }

                    .photo-card {
                        text-align: left;
                        margin-bottom: 20px;
                        flex: 0 0 calc(33.33% - 20px);
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                        transition: transform 0.3s;
                        background-color: #ffffff;
                        border-radius: 10px;
                        overflow: hidden;
                    }

                    .photo-card:hover {
                        transform: translateY(-5px);
                    }

                    .photo-img {
                        max-width: 100%;
                        height: auto;
                        border-radius: 10px 10px 0 0;
                    }

                    .photo-info {
                        padding: 20px;
                    }

                    .btn-pilih {
                        margin-top: 10px;
                        width: 100%;
                    }

                    h2 {
                        text-align: center;
                        margin-top: 20px;
                        margin-bottom: 10px;
                        color: #343a40;
                    }
                </style>
            </head>

            <body>

                <div class="container">
                    <div class="header">
                        <div>Restoran</div>
                        <div>
                            <a href="restaurant.php">Beranda</a>
                            <a href="restaurant.php">Lokasi</a>
                            <a href="dasbordadmin.php">Tutup</a>
                        </div>
                    </div>

                    <h2>FOTO RESTORAN HONG</h2>

                    <div class="photo-container">
                        <?php
                        $photoData = [
                            ["nama_makanan" => "Indian food", "harga_makanan" => "Rp 10.000", "placeholder_text" => "Appetizer", "image_path" => "../images/makan1.jpg"],
                            ["nama_makanan" => "Asorted kind", "harga_makanan" => "Rp 15.000", "placeholder_text" => "Appetizer", "image_path" => "../images/makan2.jpg"],
                            ["nama_makanan" => "Dishas cave", "harga_makanan" => "Rp 20.000", "placeholder_text" => "Main Dish", "image_path" => "../images/makan3_.jpg"],
                            ["nama_makanan" => "Dessert", "harga_makanan" => "Rp 25.000", "placeholder_text" => "Dessert", "image_path" => "../images/makan4_.jpg"],
                            ["nama_makanan" => "Drink sodac", "harga_makanan" => "Rp 30.000", "placeholder_text" => "Drink", "image_path" => "../images/minum1.jpg"],
                            ["nama_makanan" => "Paket Hemat", "harga_makanan" => "Rp 35.000", "placeholder_text" => "Appetizer", "image_path" => "../images/makan6.jpg"]
                        ];

                        foreach ($photoData as $index => $photo) {
                            echo "<div class='photo-card'>";
                            echo "<img src='" . $photo["image_path"] . "' alt='" . $photo["nama_makanan"] . "' class='photo-img'>";
                            echo "<div class='photo-info'>";
                            echo "<p class='mt-3'>" . $photo["nama_makanan"] . "</p>";
                            echo "<p>" . $photo["harga_makanan"] . "</p>";
                            echo "<p>" . $photo["placeholder_text"] . "</p>";
                            echo "<a href='pilihmakan.php?index=$index' class='btn btn-primary btn-pilih'>Pilih Makanan</a>";
                            echo "</div>";
                            echo "</div>";

                            if ($index == 2) {
                                echo "<br>";
                            }
                        }
                        ?>
                    </div>
                </div>

                <?php include "include/footer.php"; ?>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>
