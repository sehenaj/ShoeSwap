<?php
// Connect to MySQL database
$host="localhost";
$username="root";
$password="";
$dbname = "sholler";

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve shoe data from database
$sql = "SELECT * FROM seller";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) 

        echo "<div class='dash-body'>
        <div class='dash-img'>
            <img src='images/members.png' alt=''>
            <h2>".$row["name"]."</h2>


        </div>
        <div class='dash-details'>
            <div class='information'>
            <h3>Information</h3>
            <h4>Address:". $row["address"] ."</h4>
            <h4>City: ". $row["city"] ."</h4>
            <h4>Pin: ". $row["pin"] ."</h4>
            </div>
            <div class='information'>
            <h3>Contact : </h3>
            <h4>Phone :". $row["phone"] ."</h4>
            <h4>Email: ". $row["email"] ."</h4>
                </div>
            <div class='information'>
            <h3>Rating:</h3>
            <h4>". $row["rating"] ."</h4>
            </div>
        </div>
            
    </div>";


        // -------------------------------------

        // echo "Seller ID: " . $row["seller_id"] . "<br>";
        // echo "Address: " . $row["address"] . "<br>";
        // echo "City: " . $row["city"] . "<br>";
        // echo "Pin: " . $row["pin"] . "<br>";
        // echo "Phone: " . $row["phone"] . "<br>";
        // echo "Email: " . $row["email"] . "<br>";
        // echo "Rating: " . $row["rating"] . "<br>";

        // -------------------------------------
    


    
    // Close table
    
} else {
    echo "No results found.";
}

?>
