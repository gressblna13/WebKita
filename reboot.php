<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-8e3K6OkNxX+DQdzysWSTQZg9vQ1iZTvkgB9G2CfbEA7OKOsjoPAvzWytdjJQZp6mM" crossorigin="anonymous">

    <style>
        body {
            background-color: #ffffff;
            color: #333333;
        }
        
        header.navbar {
            background-color: #f8f9fa;
            padding: 10px;
            box-shadow: 0px 1px 5px rgba(0,0,0,0.1);
        }
        
        header.navbar .navbar-brand {
            color: #333333;
            font-weight: bold;
            font-size: 1.2rem;
        }

        header.navbar a {
            color: #333333;
        }

        .navbar-nav .nav-link {
            font-size: 1rem;
            color: #555555;
        }

        .container h2 {
            color: #333333;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .food-img {
            width: 100%;
            cursor: pointer;
            border-radius: 5px;
            transition: transform 0.2s;
        }

        .food-img:hover {
            transform: scale(1.05);
        }

        .reason-box h5 {
            color: #333333;
            margin-bottom: 10px;
        }

        footer {
            background-color: #f8f9fa;
            color: #555555;
            padding: 10px 0;
            text-align: center;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

<header class="navbar navbar-light" style="background-color: #f8f9fa; box-shadow: 0px 1px 5px rgba(0,0,0,0.1); padding: 10px;">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="index2-.php" class="navbar-brand" style="font-weight: bold; font-size: 1.2rem; color: #333;">COMEL'S</a>
        <div class="d-flex">
            <a href="#" class="nav-link" style="color: #555;">Home</a>
            <a href="#" class="nav-link" style="color: #555;">Link</a>
            <a href="#" class="nav-link" style="color: #555;">Kategori Wisata</a>
            <a href="#" class="nav-link" style="color: #555;">Travel</a>
            <a href="#" class="nav-link" style="color: #555;">Restaurant</a>
            <a href="#" class="nav-link" style="color: #555;">More</a>
            <a href="#" class="nav-link" style="color: #aaa;">Disabled</a>
        </div>
        <div class="input-group" style="width: 200px;">
            <input type="text" class="form-control" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="button">Search</button>
        </div>
    </div>
</header>

    <div class="container mt-4">
        <h2>Popular Food</h2>
        <div class="row">
            <?php
            $foodImages = ['aparizer1.jpg', 'main4.jpg', 'aparizer3.jpg', 'aparizer4.jpg', 'main1.jpg', 'main2.jpg', 'main3.jpg', 'main4.jpg', 'des1.jpg', 'des2.jpg', 'des3.jpg', 'des4.jpg', 'mum1.jpg', 'mum2.jpg', 'mum3.jpg', 'mum4.jpg'];

            foreach ($foodImages as $index => $image) {
                echo '<div class="col-md-3 mb-4">
                        <img src="../images/' . $image . '" alt="Food Image" class="food-img" onclick="displayFoodDetails({ id: ' . ($index + 1) . ', title: \'Menu Item ' . ($index + 1) . '\', description: \'Description for item ' . ($index + 1) . '\' })">
                      </div>';
            }
            ?>
        </div>
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
