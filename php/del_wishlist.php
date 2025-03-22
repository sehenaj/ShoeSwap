<?php
include("../auth/database.php");

// Establish database connection
$conn = mysqli_connect($host, $username, $password, "sholler");

// Check connection
if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the product ID was sent
    if (isset($_POST["product_id"])) {
        $product_id = $_POST["product_id"];
        // Do something with the product ID, like remove it from the wishlist
        removeFromWishlist($product_id, $conn);
    }
}

// Remove the product from the wishlist
function removeFromWishlist($product_id, $conn) {
    // Remove the product from the wishlist
    $sql = "DELETE FROM wishlist WHERE shoes_id = $product_id";
    mysqli_query($conn, $sql);
    // Redirect to the wishlist page
    header("Location: ../wishlist.php");
    exit;
}
?>
