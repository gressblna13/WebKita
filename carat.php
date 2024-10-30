<!DOCTYPE html>
<html lang="en">
<?php
// Include database connection file
include "include/include.php";

// Check if the form is submitted
if (isset($_POST['Simpan'])) {
    // Get form data
    $id_travel = $_POST['id_travel'];
    $category = $_POST['category'];
    $image = $_POST['image'];
    $description = $_POST['description'];

    // Insert data into the database
    $sql = "INSERT INTO travel_destinations (id_travel, category, image, description) VALUES ('$id_travel', '$category', '$image', '$description')";
    $result = mysqli_query($connection, $sql);

    // Check if the query was successful
    if ($result) {
        echo "<script>alert('Data inserted successfully');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($connection) . "');</script>";
    }
}

// Close the database connection
mysqli_close($connection);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sustainable Akomodasi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.0/dist/js/select2.min.js"></script>

    <style>
        .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        header.navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }

        header.navbar .navbar-brand {
            color: #333;
            font-weight: bold;
            font-size: 1.5rem;
            text-decoration: none;
        }

        .navbar-nav {
            display: flex;
            align-items: center;
            gap: 20px;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .navbar-nav .nav-link {
            font-size: 1rem;
            color: #555;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #fff;
            background-color: #007bff;
        }

        footer {
            background-color: #111;
            color: #fff;
            text-align: center;
            padding: 30px;
            bottom: 0;
            width: 100%;
        }

        .warna-biru {
            background-color: #708090;
            color: #fff;
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

<div class="container mt-5">
    <form class="mt-3" id="filterForm" onsubmit="filterCards(event)">
        <div class="form-group">
            <label for="filter">Choose</label>
            <select class="form-control" id="filter">
                <option value="" disabled selected>Select a category</option>
                <option value="Flocation">Flocation</option>
                <option value="Staycation">Staycation</option>
                <option value="Cinetourism">Cinetourism</option>
                <option value="Digital Detox">Digital Detox</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <div class="row mt-3">
        <div class="col-md-6">
            <h2>TRAVEL</h2>
            <div class="card mb-3 shadow-sm" id="flocationCard">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="../images/lala1.jpg" class="card-img" alt="Flocation">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Flocation</h5>
                            <p class="card-text">Traveling in your own country. For example, if we are Indonesians, for us flocation is traveling around the islands in Indonesia. Of course, with a budget that is not big, aka backpackers.</p>
                            <a href="#" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" id="cinetourismCard">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="../images/lala3.jpg" class="card-img" alt="Cinetourism">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Cinetourism</h5>
                            <p class="card-text">The activity in question is going on holiday to places related to big films. Like, for example, going on holiday to Universal Studios, Hobbiton in New Zealand, or to King's Cross Station.</p>
                            <a href="#" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" id="digitalDetoxCard">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="../images/lala4.jpg" class="card-img" alt="Digital Detox">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Digital Detox</h5>
                            <p class="card-text">Digital Detox is a vacation activity where we don't hold cellphones, laptops, tablets, and other gadgets that have an internet connection.</p>
                            <a href="#" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" id="staycationCard">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="../images/lala2.jpg" class="card-img" alt="Staycation">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Staycation</h5>
                            <p class="card-text">Staycation is a vacation by enjoying the view of the city itself or a little to the edge. One of these types of traveling can be done by bicycle, walking or by public transportation.</p>
                            <a href="#" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <h2>COMEL'S</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Explanation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Flocation: Traveling in your own country. For example, if we are Indonesians, for us flocation is traveling around the islands in Indonesia. Of course, with a budget that is not big, aka backpackers.</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Cinetourism: The activity in question is going on holiday to places related to big films. Like, for example, going on holiday to Universal Studios, Hobbiton in New Zealand, or to King's Cross Station.</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Digital Detox: Digital Detox is a vacation activity where we don't hold cellphones, laptops, tablets, and other gadgets that have an internet connection.</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Staycation: Staycation is a vacation by enjoying the view of the city itself or a little to the edge. One of these types of traveling can be done by bicycle, walking or by public transportation.</td>
                    </tr>
                </tbody>
            </table>
        </div>
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

<script>
    function filterCards(event) {
        event.preventDefault();
        const filterValue = document.getElementById("filter").value;

        // Hide all cards initially
        document.querySelectorAll(".card").forEach(card => {
            card.style.display = 'none';
        });

        // Show the selected category card
        if (filterValue) {
            document.getElementById(filterValue.toLowerCase() + "Card").style.display = 'block';
        }
    }
</script>
</body>
</html>
