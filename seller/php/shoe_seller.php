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
//Start Session

// Retrieve shoe data from database
$sql = "SELECT * FROM shoes
        WHERE seller_name = '{$_SESSION["user"]}'
        AND status = 'LISTED'";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
    
        //img src is using php because the data is falling on homepage_seller page and so we have to wirte the pasth from that location and hence we are mentioning the php before img url
       echo "<div class='card card1'>
        
            <img src='php/".$row["image_url"]."' alt='''' '>
        
        <div class='card-name'>
            <h2>".$row["brand"]."</h2>
            <h4>".$row["type"]."</h4>
            <p>". $row["description"]."</p>
            <h4>Size: ".$row["size"]."</h4>
        </div>
        <div class='card-price'>
        <h2>PRICE</h2>
        <h3>".$row["selling_price"]."</h3>
        <div class='button-container'>
        <form action='' method='post'>
        <input type='hidden' name='product_id' value='".$row["id"]."'>
        <button type='submit'>Listed</button>
        </form>
        <form action='php/remove_item.php' method='post'>
        <input type='hidden' name='product_id' value='".$row["id"]."'>
        <button type='submit'><img src='images/bin.png' ></button>
        </form>
        </div>

        
        </div>
    </div>";
      
    }
    
    
    
} else {
    echo "<img src='images/empty_cart.png' width=40% >";
    
}

$conn->close();
?>
