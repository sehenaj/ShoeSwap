<?php
// Database connection details
include("../../auth/database.php");
session_start();

// Create a new database connection
$conn = mysqli_connect($host, $username, $password, "sholler");
if (!$conn) {
    die("<script>Connection failed: </script>" . mysqli_connect_errno());

}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $gender = $_POST["gender"];
    $brand = $_POST["brand-name"];
    $type = $_POST["type"];
    $category = $_POST["category"];
    $usage = $_POST["usage"];
    $size = $_POST["shoe-size"];
    $purchase_price = $_POST["pur_price"];
    $sell_price = $_POST["sell_price"];
    $sellerName = $_SESSION['user'];
    $sellerLocation = $_SESSION['address'];
    $description = $_POST["desc"];

    // Process the uploaded image
    $targetDir = "uploads/";

    // Handle Main Image
    $mainImage = $_FILES["main_image"]["name"];
    $mainImageTargetFile = $targetDir . basename($mainImage);
    $mainImageFileType = strtolower(pathinfo($mainImageTargetFile, PATHINFO_EXTENSION));

    // Handle Image First
    $firstImage = $_FILES["first_image"]["name"];
    $firstImageTargetFile = $targetDir . basename($firstImage);
    $firstImageFileType = strtolower(pathinfo($firstImageTargetFile, PATHINFO_EXTENSION));

    // Handle Image Second
    $secondImage = $_FILES["second_image"]["name"];
    $secondImageTargetFile = $targetDir . basename($secondImage);
    $secondImageFileType = strtolower(pathinfo($secondImageTargetFile, PATHINFO_EXTENSION));

    // Check if the image files are valid
    $validExtensions = array("jpg", "jpeg", "png", "gif");
    if (
        !in_array($mainImageFileType, $validExtensions) ||
        !in_array($firstImageFileType, $validExtensions) ||
        !in_array($secondImageFileType, $validExtensions)
    ) {
        echo "Invalid image format. Only JPG, JPEG, PNG, and GIF files are allowed.";
        exit();
    }

    // Move the uploaded images to the target directory
    if (
        move_uploaded_file($_FILES["main_image"]["tmp_name"], $mainImageTargetFile) &&
        move_uploaded_file($_FILES["first_image"]["tmp_name"], $firstImageTargetFile) &&
        move_uploaded_file($_FILES["second_image"]["tmp_name"], $secondImageTargetFile)
    ) {
        // SQL query to insert data into the database
        $sql = "INSERT INTO shoes (brand, type, category, shoe_usage, gender, size,purchase_price, selling_price, seller_name, seller_location, image_url, image_url_f, image_url_s, description)
        VALUES ('$brand', '$type', '$category', '$usage', '$gender', '$size', '$purchase_price','$sell_price', '$sellerName', '$sellerLocation', '$mainImageTargetFile', '$firstImageTargetFile', '$secondImageTargetFile', '$description')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>Data uploaded successfully.</script>";
            header("Location: ../homepage_seller.php");

        } else {
            echo "<script>Error in Uploading Data</script>";
            header("Location: ../apply.html");
        }
    } else {
        echo "<script>Error uploading Images.</script>";
        header("Location: ../homepage_seller.php");
    }
}

//Close the database connection
// $conn->close();
?>