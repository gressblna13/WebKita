<!doctype html>
<?php
include "include/include.php";
if (isset ($_POST['Simpan']))
{
    $id_travel = $_POST['id_travel'];
    $category= $_POST['category'];
    $image = $_POST['image'];
    $description = $_POST['description'];

    mysqli_query($connection,"INSERT INTO travel_destinations VALUES ('$id_travel','$category', '$image')");
    header ("location:carat.php");

}
?>


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get travel destinations based on category
function getDestinations($category) {
    global $conn;
    $category = $conn->real_escape_string($category);

    $sql = "SELECT * FROM travel_destinations WHERE category = '$category'";
    $result = $conn->query($sql);

    $destinations = [];
    while ($row = $result->fetch_assoc()) {
        $destinations[] = $row;
    }

    return $destinations;
}

// Close the connection (Note: This is placed at the end of the script)
// $conn->close();
?>
