<?php

if ($_SERVER["REQUEST_METHOD"]="POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    $msg = $_POST['msg'];

    #inlcuding the database and their configuration
    include('../auth/database.php');
    // Connect to the database
// $host="localhost";
// $username="root";
// $password="";
// $database="sholler";

    //creating Connection
    $conn = mysqli_connect($host, $username, $password, $database);

    //$database="sholler";

    if (!$conn) {
        die("<br>Connection Failed." . mysqli_connect_error());
    }

    // Prepare and execute the SQL statement to insert data
    $sql = "INSERT INTO contact (name, email, phno, msg) VALUES ('$name', '$email', '$phno', '$msg')";

    if ($conn->query($sql) === TRUE) {
        //echo "Data stored successfully";
        ?>
        
        <script>
            alert("Query submitted successfully!\nWe will connect you via email.");
            setTimeout(function(){
                window.location.href = "../index.html"; // Redirect to success page
            }, 100); // 3 seconds delay
        </script>
        <?php

    } else {
        ?>
        
        
        <script>
            alert("Query submitted successfully!");
            setTimeout(function(){
                window.location.href = "../index.html"; // Redirect to success page
            }, 100); // 3 seconds delay
        </script>
        <?php
       

    }

}
?>