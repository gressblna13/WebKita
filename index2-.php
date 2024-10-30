<!DOCTYPE html>
<html lang="en">

<?php
include "include/include.php";
$kategori = mysqli_query($connection, "SELECT * FROM kategoriwisata");
$penjualanoleholeh = mysqli_query($connection, "SELECT * FROM penjualanoleholeh");
$restaurant = mysqli_query($connection, "SELECT * FROM restaurant");
$photodestinasi = mysqli_query($connection, "SELECT * FROM photodestinasi");
$destinasi = mysqli_query($connection, "SELECT * FROM kategoriwisata, destinasi 
where kategoriwisata.kategoriKODE = destinasi.kategoriKODE");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebKita</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-rREsjFnpnnv1tLNJJC5a9GPjL5MSwXM5ZGfOjz8vGWzBL2qmg7J8VFI8v6MEGys" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        header {
            background-color: #f5f5f5;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            color: #333;
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        nav li {
            margin-right: 20px;
        }
        nav a {
            text-decoration: none;
            color: #555;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .search-container {
            display: flex;
            align-items: center;
        }
        .search-input {
            border: 1px solid #ccc;
            padding: 8px;
            border-radius: 5px;
            margin-right: 10px;
        }
        .search-button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .search-button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
 
<div class="container-fluid">
<!-- membuat menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" style="font-family: 'Garamond', serif; font-weight: bold;">COMEL'S</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kategori Wisata
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php 
                        if(mysqli_num_rows($kategori) > 0) {
                            while ($row = mysqli_fetch_array($kategori)) { ?>
                                <li><a class="dropdown-item" href="#"><?php echo $row["kategoriNAMA"]; ?></a></li>
                            <?php }
                        } ?>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTravel" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Travel
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownTravel">
                        <?php
                        $kategori = mysqli_query($connection, "SELECT * FROM destinasitravel");
                        if (!$kategori) {
                            print("Error: " . mysqli_error($connection));
                        }

                        while ($row = mysqli_fetch_array($kategori)) { ?>
                            <li><a class="dropdown-item" href="carat.php"><?php echo $row['nama_destinasi']; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownRestaurant" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Restaurant
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownRestaurant">
                        <?php
                        $kategori = mysqli_query($connection, "SELECT * FROM restaurant");
                        if (!$kategori) {
                            print("Error: " . mysqli_error($connection));
                        }

                        while ($row = mysqli_fetch_array($kategori)) { ?>
                            <li><a class="dropdown-item" href="#"><?php echo $row['category']; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownOther" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        More
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownOther">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>

            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<!-- akhir menu -->

 
<!-- membuat slider -->

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

  <div class="carousel-indicators">

    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>

    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>

    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>

  </div>

  <div class="carousel-inner">

    <div class="carousel-item active">

      <img src="../images/labuanbajo1.jpg" class="d-block w-100" alt="Gambar Tidak Ada">

      <div class="carousel-caption d-none d-md-block">

        <h5>LABUAN BAJO </h5>

        <p>There is nothing more beautiful than seeing the tenacity of the sea that refuses to stop kissing the shoreline. Even though I had to get carried away many times by the current.</p>

      </div>

    </div>

    <div class="carousel-item">

      <img src="../images/labuanbajo2.jpg" class="d-block w-100" alt="Gambar Tidak Ada">

      <div class="carousel-caption d-none d-md-block">

        <h5>PINK L BEACH</h5>

        <p>There is nothing more beautiful than seeing the tenacity of the sea that refuses to stop kissing the shoreline. Even though I had to get carried away many times by the current.</p>

      </div>

    </div>

    <div class="carousel-item">

      <img src="../images/labuanbajo3.jpg" class="d-block w-100" alt="Gambar Tidak Ada">

      <div class="carousel-caption d-none d-md-block">

        <h5>BEAUTY OF SUNSET OVER THE MOUNTAIN</h5>

        <p>There is nothing more beautiful than seeing the tenacity of the sea that refuses to stop kissing the shoreline. Even though I had to get carried away many times by the current.</p>

      </div>

    </div>

  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">

    <span class="carousel-control-prev-icon" aria-hidden="true"></span>

    <span class="visually-hidden">Previous</span>

  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">

    <span class="carousel-control-next-icon" aria-hidden="true"></span>

    <span class="visually-hidden">Next</span>

  </button>

</div>

<!-- akhir slider -->
 
<!-- membuat kolom berita -->

<div class="container">

  <div class="row">

    <div class="col-sm-9">
      <?php
        if (mysqli_num_rows($destinasi)>0)
        {
          while ($row=mysqli_fetch_array($destinasi)){
      
      ?>

    <div class="d-flex">

      <div class='flex-shrink-0 mt-4'>
      <img style="width:200px; height:100%; margin_top:40px;" 
      src="../images/<?php echo $row ["destinasiFOTO"];?>">

       </div>
       <div class="flex-grow-2 ms-5 mt-10">

      <h5><?php echo $row ["destinasiNAMA"];?> <small class="text-muted"><i><?php echo $row ["kategoriNAMA"]?></i></small></h5>
      <p><?php echo substr ($row["destinasiKET"],0,250);?>....</p>


    <a href="#" class="btn btn-primary">Read More</a>

      </div>

    </div>

  <?php 
  }
}
  ?>
      </div>

      <div class="col-sm-3 mt-5">
      <div class="row">
  <div class="card" style="margin-bottom: 20px;">
    <div class="card-body">
      <h5 class="card-title">Restaurant</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <!-- Ganti # dengan path atau URL menuju restaurant.php -->
      <a href="restaurant.php" class="btn btn-primary">Go to Restaurant</a>
    </div>
  </div>
</div>
  
  <!-- Menambahkan sedikit ruang -->
  <div class="mb-5"></div>

  <div class="row">
  <div class="card" style="margin-bottom: 20px;">
    <div class="card-body">
      <h5 class="card-title">DestinasiTravel</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <!-- Ganti # dengan path atau URL menuju destinasitravel.php -->
      <a href="destinasitravel.php" class="btn btn-primary">Go to DestinasiTravel </a>
    </div>
  </div>
</div>


 
    </div>

  </div> <!--penutup row -->

</div>  <!--penutup container-->

<!-- akhir kolom berita -->  

<!-- Carousel wrapper -->

<div

  id="carouselMultiItemExample"

  class="carousel slide carousel-dark text-center"

  data-mdb-ride="carousel"

>

  <!-- Controls -->

  <div class="d-flex justify-content-center mb-4">

    <button

      class="carousel-control-prev position-relative"

      type="button"

      data-mdb-target="#carouselMultiItemExample"

      data-mdb-slide="prev"

    >

      <span class="carousel-control-prev-icon" aria-hidden="true"></span>

      <span class="visually-hidden">Previous</span>

    </button>

    <button

      class="carousel-control-next position-relative"

      type="button"

      data-mdb-target="#carouselMultiItemExample"

      data-mdb-slide="next"

    >

      <span class="carousel-control-next-icon" aria-hidden="true"></span>

      <span class="visually-hidden">Next</span>

    </button>

  </div>

  

<!--tambahan-->
<div class="row">
  <div class="col-sm-6 mb-3">
    <div class="card">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="../images/fotob9.jpg" class="card-img" alt="Gambar 1">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Restaurant</h5>
            <p class="card-text">Le Restaurant is a restaurant in Amsterdam, Netherlands. Previously Graham Mee was also a head chef, but he left in 2016 to start his own restaurant</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 mb-3">
    <div class="card">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="../images/fotob10.jpg" class="card-img" alt="Gambar 2">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Destinasi Travel</h5>
            <p class="card-text">Amsterdam fans out south from the Amsterdam Centraal station and Damrak, the main street off the station. The oldest area of the town</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6 mb-3">
    <div class="card">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="../images/fotob11.jpg" class="card-img" alt="Gambar 3">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Oleh-Oleh</h5>
            <p class="card-text">Namdaemun, this is the only market in Korea that I visit most often. Apart from the fact that this is the center for traditional Korean-style souvenirs, the location is also very strategic.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 mb-3">
    <div class="card">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="../images/fotob15.jpg"  class="card-img" alt="Gambar 4">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Hotel</h5>
            <p class="card-text">Le Restaurant is a restaurant in Amsterdam, Netherlands. Previously Graham Mee was also a head chef, but he left in 2016 to start his own restaurant</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6 mb-3">
    <div class="card">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="../images/fotob16.jpg" class="card-img" alt="Gambar 5">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Destinasi Foto</h5>
            <p class="card-text">Amsterdam fans out south from the Amsterdam Centraal station and Damrak, the main street off the station.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 mb-3">
    <div class="card">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="../images/fotob14.jpg" class="card-img" alt="Gambar 6">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Berita</h5>
            <p class="card-text">Namdaemun, this is the only market in Korea that I visit most often. Apart from the fact that this is the center for traditional Korean-style souvenirs, location.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--akhir tambahan-->

<!-- photodestinasi -->
<style>
  .custom-card {
    border-radius: 15px;
    transition: transform 0.3s; 
    background-color: #e0e0e0; 
  }

  .custom-card:hover {
    transform: scale(1.05); 
  }
</style>

<div class="container text-center">
  <h2 class="mt-4 mb-4">poto destinasi</h2>

  <div class="row justify-content-center">

    <?php
    if (mysqli_num_rows($photodestinasi) > 0) {
      $count = 0; 
      while ($row = mysqli_fetch_array($photodestinasi)) {
    ?>

        <div class="col-sm-3 mt-2 mb-2">
          <div class="card shadow mb-3 custom-card" style="width: 18rem;">
            <img class="card-img-top mt-4 mb-4 mx-auto" style="width:257px; height:150px; display: block; border-radius: 15px;" src="../images/<?php echo $row["fotodestinasiFILE"] ?>" alt="Gambar Tidak Ada">

            <div class="card-body">
              <h5 class="card-title"><?php echo $row["fotodestinasiNAMA"]; ?></h5>
            </div>
          </div>
        </div>

        <?php
        $count++;
        // Periksa apakah dua kartu sudah ditampilkan, jika ya, mulai baris baru
        if ($count % 4 === 0) {
          echo '</div><div class="row justify-content-center">';
        }
      }
    }
    ?>
  </div>
</div>

<!-- photo penutup photodestinasi -->

<!-- tambahan 2 -->
<style>
        .container {
            padding: 20px;
        }

        .col-md-4 {
            padding: 15px;
            margin-bottom: 20px;
        }

        .pink-background1 {
            background-color: #ffd1dc; 
            border-radius: 10px;
            
        }

        .pink-background2 {
            background-color: #ffd1dc; 
            border-radius: 10px;
        }

        .pink-background3 {
            background-color: #ffd1dc; 
            border-radius: 10px;
        }
    </style>
   
</head>
<body>

<div class="container">
<h2 class="mt-4 mb-4"></h2>
    <div class="row">
      
    <div class="col-md-4 pink-background1">
    <?php
    include "include/include.php";

    // Query untuk mendapatkan data dari tabel foods
    $queryFoods = "SELECT * FROM foods LIMIT 4";
    $resultFoods = mysqli_query($connection, $queryFoods);

    // Tampilkan data makanan
    while ($rowFood = mysqli_fetch_assoc($resultFoods)) {
        $id_resto = $rowFood['id_resto'];
        $title = $rowFood['title'];
        $description = $rowFood['description'];
        $imageUrl = $rowFood['imageUrl'];
        $category = $rowFood['category'];
    ?>
        <a href="reboot.php?id_resto=<?= $id_resto ?>">
            <img src="../images/<?= $imageUrl ?>" alt="<?= $title ?>" class="img-fluid" style="width: 3500px; height: 270px;" />
            <h4><?= $title ?></h4>
            <p><?= $description ?></p>
        </a>
    <?php
    }

    // Output debugging jika tidak ada data makanan
    if (mysqli_num_rows($resultFoods) === 0) {
        echo "No data found for the specified foods.";
    }

    // Tutup koneksi database
    mysqli_close($connection);
    ?>
</div>




        <div class="col-md-4 pink-background2">
    <?php
    include "include/include.php";

    // Query untuk mendapatkan satu destinasi dari setiap negara
    $queryDestinasi = "SELECT * FROM shine WHERE nama IN ('Japan', 'Amsterdam', 'Korea', 'Paris') LIMIT 4";
    $resultDestinasi = $connection->query($queryDestinasi);

    // Menggunakan while loop untuk membaca semua destinasi
    while ($row = $resultDestinasi->fetch_assoc()) {
        $id_shine = $row['id_shine'];
        $nama = $row['nama'];
        $gambar = $row['gambar'];

        // Tampilkan data untuk setiap destinasi
        ?>
        <a href="shine.php?id_shine=<?= $id_shine ?>">
            <img src="../images/<?= $gambar ?>" alt="<?= $nama ?>" class="img-fluid" />
            <h4><?= $nama ?></h4>
            <p>photos of destinations in 4 countries</p>
        </a>
        <?php
    }

    // Output debugging
    if ($resultDestinasi->num_rows === 0) {
        echo "No data found for the specified destinations.";
    }

    // Tutup koneksi
    $connection->close();
    ?>
</div>
 


        <div class="col-md-4 pink-background3">
    <?php
    // Include file koneksi
    include "include/include.php";

    // Query untuk mendapatkan informasi dari tabel travel_destinations
    $sql = "SELECT * FROM travel_destinations LIMIT 4"; // Mengambil 4 destinasi sebagai contoh
    $result = mysqli_query($connection, $sql);

    // Loop melalui hasil query
    while ($row = mysqli_fetch_assoc($result)) {
        $id_travel = $row['id_travel'];
        $category = $row['category'];
        $image = $row['image'];
        $description = $row['description'];
    ?>
        <a href="carat.php?id=<?php echo $id_travel; ?>">
            <img src="<?php echo $image; ?>" alt="" class="img-fluid" />
            <h4><?php echo $category; ?></h4>
            <p><?php echo $description; ?></p>
        </a>
    <?php
    }

    // Tutup koneksi database
    mysqli_close($connection);
    ?>
</div>

</div>




<!-- akhir tambahan 2-->



<!--oleholeh1-->

<div class="container text-center">
  <h2 class="mt-4 mb-4">Small Gifts</h2>

  <div class="row justify-content-center">

    <?php
    if (mysqli_num_rows($penjualanoleholeh) > 0) {
      $count = 0; // Counter untuk melacak jumlah kartu
      while ($row = mysqli_fetch_array($penjualanoleholeh)) {
    ?>

        <div class="col-sm-3 mt-2 mb-2">
          <div class="card shadow mb-3" style="width: 18rem;">
            <img class="card-img-top mt-4 mb-4 mx-auto" style="width:257px; height:150px; display: block;" src="../images/<?php echo $row["gambar"] ?>" alt="Gambar Tidak Ada">

            <div class="card-body">
              <h5 class="card-title"><?php echo $row["nama_pembeli"]; ?></h5>
              <p class="card-text"><?php echo substr($row["lokasi"], 0, 250); ?></p>
              <p class="card-text"><small class="text-muted"><i><?php echo $row["pesanan"] ?></i></small></p>
            </div>
          </div>
        </div>

        <?php
        $count++;
        // Periksa apakah dua kartu sudah ditampilkan, jika ya, mulai baris baru
        if ($count % 4 === 0) {
          echo '</div><div class="row justify-content-center">';
        }
      }
    }
    ?>
  </div>
</div>

<!--penutupoleholeh-->

<!--foto destinasi wisata-->
<div class="container text-center">
  <h2 class="mt-4 mb-4">Food at My Restaurant</h2>

  <div class="row justify-content-center">

    <?php
    if (mysqli_num_rows($restaurant) > 0) {
      $count = 0; // Counter untuk melacak jumlah kartu
      while ($row = mysqli_fetch_array($restaurant)) {
        $count++;
    ?>

        <div class="col-sm-3 mt-2 mb-2 mx-2">
          <div class="card mb-3" style="width: 18rem; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 123, 255, 0.1);">
            <img class="card-img-top" style="width:100%; height:160px; display: block; border-radius: 15px 15px 0 0;" src="../images/<?php echo $row["images"] ?>" alt="Gambar Tidak Ada">

            <div class="card-body">
              <h5 class="card-title text-center mb-3"><?php echo $row["nama_menu"]; ?></h5>
              <p class="card-text"><?php echo substr($row["category"], 0, 250); ?></p>
              <p class="card-text"><small class="text-muted"><i><?php echo $row["description"] ?></i></small></p>
            </div>
          </div>
        </div>

        <?php
        // Periksa apakah dua kartu sudah ditampilkan, jika ya, mulai baris baru
        if ($count % 3 === 0) {
          echo '</div><div class="row justify-content-center">';
        }
      }
    }
    ?>
  </div>
</div>




<!--akhir restaurant -->



<!--tambahan 3-->

<style>
    .backgroundcarat img {
        border-radius: var(--backgroundcarat-border-radius);
    }

    .containerb {
        color: black;
        /* Warna teks putih untuk kontras */
        padding: 20px;
        border-radius: 10px;
        display: flex;
        /* Use flex display to arrange calendar and news side by side */
        align-items: flex-start;
        /* Align items at the start (top) of the flex container */
    }

    .news-container {
        /* Create a separate container for news content */
        width: 60%;
        /* Set the width for the news content */
        margin-right: 20px;
        /* Add some spacing between news and calendar */
        display: flex;
        flex-direction: column;
        align-items: center;
        /* Center align items horizontally */
    }

    .card-container {
        margin-bottom: 20px;
        width: 100%;
    }

    .card-container .d-flex {
        align-items: center;
    }

    .card-container img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: var(--backgroundcarat-border-radius);
    }

    .card-container .card-body {
        margin-right: 20px;
    }

    .card-container h5 {
        margin-bottom: 0;
    }

    .calendar-container {
        background-color: #f5f5f5;
        padding: 20px;
        border-radius: 10px;
        /* Keep the styling for the calendar */
    }

    .calendar-container h2 {
        margin-bottom: 10px;
    }

    .asahi-heading {
        /* Add a new style for the heading */
        text-align: center;
    }
</style>
<h1>BERITA</h1>
<div class="containerb">
    <div class="news-container">
        <div class="card-container">
            <h4 class="asahi-subheading">Winners From Day One Of The 2023 “MAMA Awards”</h4>
            <div class="d-flex">
                <img src="../images/io1.jpg" class="card-img-top rounded" alt="Image Alt Text">
                <div class="card-body">
                    <h5 class="card-title">SEVENTEEN</h5>
                    <p class="card-text">Best Male Group, best dance performance male group, best music video,
                        worldwide fans' choice</p>
                </div>
            </div>
        </div>

        <div class="card-container">
            <div class="d-flex">
                <img src="../images/io.jpg" class="card-img-top rounded" alt="Image Alt Text">
                <div class="card-body">
                    <h5 class="card-title">Treasure</h5>
                    <p class="card-text">Worldwide fans' choice, Artist of the year, Best male group</p>
                </div>
            </div>
        </div>

        <div class="card-container">
            <div class="d-flex">
                <img src="../images/io3.jpg" class="card-img-top rounded" alt="Image Alt Text">
                <div class="card-body">
                    <h5 class="card-title">NCT Dream</h5>
                    <p class="card-text">Best male group, Best dance performance male group, song of the year, artist of the year, worldwide fans' choice.</p>
                </div>
            </div>
        </div>

        <div class="card-container">
            <div class="d-flex">
                <img src="../images/io2.jpg" class="card-img-top rounded" alt="Image Alt Text">
                <div class="card-body">
                    <h5 class="card-title">Straykids</h5>
                    <p class="card-text">Worldwide fans' choice, Artist of the year, Song of the year, Best music video.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="calendar-container">
        <h2>Kalender Acara</h2>
        <ul>
            <li> <h6>ATEEZ</h6>
            <p> Title Track: ‘미친 폼 (Crazy Form)</p> 
            <p> Album: THE WORLD EP.FIN : WILL</p>
            </li>
            <li> <h6>DK (SEVENTEEN)</h6>
            <p> Title Track: “Short Hair”</p> 
            <p> OST: Welcome to Samdal-ri OST Part.1</p>
            </li>
            <li> <h6>NMIXX</h6>
            <p>Album: 2nd EP Fe3O4: BREAK”</p> 
            <p>  Soñar (Breaker)</p>
            </li>
            <li> <h6>NCTU</h6>
            <p>Album: 2nd EP Fe3O4: BREAK”</p> 
            <p> Title Track: “Marine Turtle”</p>
            </li>
            <li> <h6>ITZY</h6>
            <p>Title Track: “UNTOUCHABLE”</p> 
            <p> Album: 2nd Album ITZY (BORN TO BE)</p>
            </li>
            <li> <h6>PARK EUN BIN(박은빈)</h6>
            <p>Title Track: “Fly Away”</p> 
            <p> OST: CASTAWAY DIVA(무인도의 디바) OST</p>
            </li>
        </ul>
    </div>
</div>



<!--akhir tambahan 3-->

  <!-- Inner -->

  <div class="carousel-inner py-4">

  
    <!-- Single item -->

    <div class="carousel-item active">

      <div class="container">

        <div class="row">

          <div class="col-lg-4">

            <div class="card">

              <img

                src="../images/wq1.jpg"

                class="card-img-top"

                alt="Waterfall"

              />

              

              <div class="card-body">

                <h5 class="card-title">cow house amsterdam</h5>

                <p class="card-text">

                Amstelpark is one of the two most popular parks in Amsterdam. There are lots of things you can do in this park starting from a play area for children, cafes, restaurants, galleries and mini-golf. This green park area is very suitable for relaxing or jogging .

                </p>

                <a href="#!" class="btn btn-primary">Button</a>

              </div>

            </div>

          </div>
 
          <div class="col-lg-4 d-none d-lg-block">

            <div class="card">

              <img

                src="../images/wq2.jpg"

                class="card-img-top"

                alt="Sunset Over the Sea"

              />

              <div class="card-body">

                <h5 class="card-title">PICNIC IN AMSTERDAM</h5>

                <p class="card-text">

                Big and probably busy, yet also very fun! The great thing about the Vondelpark is that there is so much to see. Just watch everyone around you and enjoy your long summer night comfortable, safe, calm and peaceful.

                </p>

                <a href="#!" class="btn btn-primary">Button</a>

              </div>

            </div>

          </div>
 
          <div class="col-lg-4 d-none d-lg-block">

            <div class="card">

              <img

                src="../images/wq3.jpg"

                class="card-img-top"

                alt="Sunset over the Sea"

              />

              <div class="card-body">

                <h5 class="card-title">TULIP PINK </h5>

                <p class="card-text">

                Pink Tulip Flowers Symbolize appreciation and good wishes. In the Netherlands, at every sporting event, the flower necklace given to the winner is a series of pink tulips, as an expression of appreciation for the victory that has been achieved.

                </p>

                <a href="#!" class="btn btn-primary">Button</a>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>
 
    <!-- Single item -->


    <div class="carousel-item">

      <div class="container">

        <div class="row">

          <div class="col-lg-4 col-md-12">

            <div class="card">

              <img

                src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp"

                class="card-img-top"

                alt="Fissure in Sandstone"

              />

              <div class="card-body">

                <h5 class="card-title">Card title</h5>

                <p class="card-text">

                  Some quick example text to build on the card title and make up the bulk

                  of the card's content.

                </p>

                <a href="#!" class="btn btn-primary">Button</a>

              </div>

            </div>

          </div>
 
          <div class="col-lg-4 d-none d-lg-block">

            <div class="card">

              <img

                src="https://mdbcdn.b-cdn.net/img/new/standard/nature/185.webp"

                class="card-img-top"

                alt="Storm Clouds"

              />

              <div class="card-body">

                <h5 class="card-title">Card title</h5>

                <p class="card-text">

                  Some quick example text to build on the card title and make up the bulk

                  of the card's content.

                </p>

                <a href="#!" class="btn btn-primary">Button</a>

              </div>

            </div>

          </div>
 
          <div class="col-lg-4 d-none d-lg-block">

            <div class="card">

              <img

                src="https://mdbcdn.b-cdn.net/img/new/standard/nature/186.webp"

                class="card-img-top"

                alt="Hot Air Balloons"

              />

              <div class="card-body">

                <h5 class="card-title">Card title</h5>

                <p class="card-text">

                  Some quick example text to build on the card title and make up the bulk

                  of the card's content.

                </p>

                <a href="#!" class="btn btn-primary">Button</a>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>
 
    <!-- Single item -->

    <div class="carousel-item">

      <div class="container">

        <div class="row">

          <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">

            <div class="card">

              <img

                src="https://mdbcdn.b-cdn.net/img/new/standard/nature/187.webp"

                class="card-img-top"

                alt="Peaks Against the Starry Sky"

              />

              <div class="card-body">

                <h5 class="card-title">Card title</h5>

                <p class="card-text">

                  Some quick example text to build on the card title and make up the bulk

                  of the card's content.

                </p>

                <a href="#!" class="btn btn-primary">Button</a>

              </div>

            </div>

          </div>
 
          <div class="col-lg-4 mb-4 mb-lg-0 d-none d-lg-block">

            <div class="card">

              <img

                src="https://mdbcdn.b-cdn.net/img/new/standard/nature/188.webp"

                class="card-img-top"

                alt="Bridge Over Water"

              />

              <div class="card-body">

                <h5 class="card-title">Card title</h5>

                <p class="card-text">

                  Some quick example text to build on the card title and make up the bulk

                  of the card's content.

                </p>

                <a href="#!" class="btn btn-primary">Button</a>

              </div>

            </div>

          </div>
 
          <div class="col-lg-4 mb-4 mb-lg-0 d-none d-lg-block">

            <div class="card">

              <img

                src="https://mdbcdn.b-cdn.net/img/new/standard/nature/189.webp"

                class="card-img-top"

                alt="Purbeck Heritage Coast"

              />

              <div class="card-body">

                <h5 class="card-title">grasya munthe2</h5>

                <p class="card-text">

                  Some quick example text to build on the card title and make up the bulk

                  of the card's content.

                </p>

                <a href="#!" class="btn btn-primary">Button</a>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

  <!-- Inner -->

</div>

<!-- Carousel wrapper -->
 
    

</div> 

<!-- Footer -->
<footer class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-4">
                <h6 class="font-weight-bold">Website Ku</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>

            <div class="col-md-3 mb-4">
                <h6 class="font-weight-bold">Products</h6>
                <ul class="list-unstyled">
                    <li><a class="text-white" href="#">Restaurant</a></li>
                    <li><a class="text-white" href="#">Travel Destinations</a></li>
                    <li><a class="text-white" href="#">Souvenirs</a></li>
                    <li><a class="text-white" href="#">Photo Destinations</a></li>
                    <li><a class="text-white" href="#">Hotel</a></li>
                    <li><a class="text-white" href="#">News</a></li>
                </ul>
            </div>

            <div class="col-md-3 mb-4">
                <h6 class="font-weight-bold">Contact</h6>
                <address class="mb-0">
                    <i class="fas fa-home me-2"></i> Korea Selatan<br>
                    <i class="fas fa-phone me-2"></i> +01 234 567 88<br>
                    <i class="fas fa-print me-2"></i> +01 234 567 89
                </address>
            </div>

            <div class="col-md-3 mb-4">
                <h6 class="font-weight-bold">Follow Us</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a class="text-white" href="https://www.instagram.com/gressblna/" target="_blank"><i class="bi bi-instagram"></i> Instagram</a></li>
                    <li class="mb-2"><a class="text-white" href="https://web.whatsapp.com/" target="_blank"><i class="bi bi-whatsapp"></i> WhatsApp</a></li>
                    <li class="mb-2"><a class="text-white" href="http://line.me/ti/p/~ID_LINE_kamu" target="_blank"><i class="bi bi-chat"></i> LINE</a></li>
                    <li class="mb-2"><a class="text-white" href="https://www.linkedin.com/in/grasam" target="_blank"><i class="bi bi-linkedin"></i> LinkedIn</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="text-center p-3" style="background-color: #343a40; color: #ffb6c1;">
        © 2023 comel's website.
    </div>
</footer>
<!-- End of Footer -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
