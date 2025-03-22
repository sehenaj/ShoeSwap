<?php
include("../../auth/database.php");
session_start(); //--------Starting session to get user 
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
        // Do something with the product ID, like add it to the cart
        // Check if the product is already in the cart

        // Product does not exist in the cart, so add it
        CancelOrder($product_id, $conn);
        // header("Location: ../Home.php");
        header("Refresh:0 ; url=../homepage_seller.php");
        exit();
    }



}


// Add the product to the cart
function CancelOrder($product_id, $conn)
{
    // Add the product to the cart
    $sql = "SELECT * FROM shoes WHERE id = $product_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Fetch the product data
        $row = mysqli_fetch_assoc($result);

        // Remove the product from the user's table
        $sql = "DELETE FROM shoes WHERE id = $product_id ";
        mysqli_query($conn, $sql);
        // Remove the product from the cart table
        $sql = "DELETE FROM cart WHERE shoes_id = $product_id";
        mysqli_query($conn, $sql);

        // Remove the product from the wishlist table
        $sql = "DELETE FROM wishlist WHERE shoes_id = $product_id";
        mysqli_query($conn, $sql);
        // Redirect to the cart page
        header("Location: ../homepage_seller.php");
        exit;
    }

}
?>