<?php
// Start the session


session_start();
// Calculate total price and offer price of selected items
$host = "localhost";
$username = "root";
$password = "";
$dbname = "sholler";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['product_id'], $_POST['comment'])) {
    // Retrieve the form input values
    $product_id = $_POST['product_id'];
    
    $user = $_SESSION['user'];
    
    // Retrieve the seller value from the shoes table
    $sql_seller = "SELECT seller_name FROM shoes WHERE id = '$product_id'";
    $result_seller = mysqli_query($conn, $sql_seller);
    if ($result_seller && mysqli_num_rows($result_seller) > 0) {
        $row_seller = mysqli_fetch_assoc($result_seller);
        $seller = $row_seller['seller_name'];
    } else {
        echo "Error retrieving seller: " . mysqli_error($conn);
        exit;
    }


    // Validate the comment
    $comment = trim($_POST['comment']);
    if (empty($comment)) {
        echo "Please enter a comment.";
        exit;
    }

    // Perform any necessary sanitization or validation on the data

    // Connect to the database

    if (!$conn) {
        echo "Failed to connect to the database: " . mysqli_connect_error();
        exit;
    }

    // Insert the comment into the comment table
    $sql = "INSERT INTO comment (seller, user, comment, shoes_id) VALUES ('$seller', '$user', '$comment', '$product_id')";
    if (mysqli_query($conn, $sql)) {
        ?>
        <script>
            alert("Comment Submitted Successfully.");
            setTimeout(function() {
                window.location.href = "../review.php";
            }, 30); // Redirect after 3 seconds (3000 milliseconds)
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Error submitting comment");
            setTimeout(function() {
                window.location.href = "../review.php";
            }, 30); // Redirect after 3 seconds (3000 milliseconds)
        </script>
        <?php
    }
    

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>