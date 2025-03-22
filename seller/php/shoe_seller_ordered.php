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
        AND status = 'sold'";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
    
        //img src is using php because the data is falling on homepage_seller page and so we have to wirte the pasth from that location and hence we are mentioning the php before img url
        
        echo "
            <div class='card card1'>
                <img src='php/".$row["image_url"]."' alt=''>
                <div class='card-name'>
                    <h2>".$row["brand"]."</h2>
                    <h4>".$row["type"]."</h4>
                    <p>". $row["description"]."</p>
                    <h4>Size: ".$row["size"]."</h4>
                </div>
                <div class='card-price'>
                    <h2>PRICE</h2>
                    <h3>".$row["selling_price"]."</h3>
                    <div class='button-container'>";
                    
        // Fetch the created_date for the shoes_id from the order table
        $orderSql = "SELECT created_date FROM `order` WHERE shoes_id = '".$row["id"]."'";
        $orderResult = $conn->query($orderSql);
        
        if ($orderResult->num_rows > 0) {
            $orderRow = $orderResult->fetch_assoc();
            $createdDate = strtotime($orderRow['created_date']);
            $currentDate = time();
            $daysDifference = floor(($currentDate - $createdDate) / (60 * 60 * 24));
        
            if ($daysDifference > 2) {
                echo "<button type='submit'>Sold</button>";
            } else {
                echo "<button type='submit'>Item Picked Soon</button>";
            }
        } else {
            echo "<button type='submit'>Sold</button>";
        }
        
        echo "
                        <form action='pdf.php' method='post'>
                            <input type='hidden' name='product_id' value='".$row["id"]."'>
                            <button type='submit'>Invoice</button>
                        </form>
                    </div>
                </div>
            </div>
        ";
    }
        
    
    
    
} else {
    echo "<img src='images/empty_cart.png' width=40%>";
    
}

$conn->close();
?>
