<?php
// Connect to MySQL database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "sholler";

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve shoe data from database
$sql = "SELECT * FROM shoes where status='listed'";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {

  while ($row = $result->fetch_assoc()) {



// Calculate the percentage difference
$percentageDifference = (($row['purchase_price'] - $row['selling_price']) / $row['purchase_price']) * 100;




    echo "
    
            <div class='col-lg-3 col-md-4 mb-3'>
                <div class='product-box'>
                <div class='product-inner-box position-relative'>
                    <div class='icons position-absolute'>
                    <form action='product_page.php' target='_blank' method='post'>
                     <input type='hidden' name='product_id' value='" . $row["id"] . "'>
                     <button type='submit' class='btn btn-light rounded-pill text-decoration-none text-dark'><img src='images/icons/eye.png' width=15px alt=''></button>
                      </form>
                    <form action='php/add_to_wishlist.php' method='post'>
                     <input type='hidden' name='product_id' value='" . $row["id"] . "'>
                        <button type='submit' class='btn btn-light rounded-pill text-decoration-none text-dark'><img src='images/icons/wishlist.png' width=15px alt=''></button>
                    </form>
                    </div>
                    <div class='onsale'>
                        <span class='badge badge-rounded-0'>" . round($percentageDifference, 2) . "%</span>
                    </div>
                     <img src='seller/php/" . $row['image_url'] . "' alt=''id='product-img' class='img-fluid img-item'>
                      
                     <div class='cart-btn'>
                     <form action='php/add_to_order.php' method='post'>
                     <input type='hidden' name='product_id' value='" . $row["id"] . "'>
                        <button class='btn btn-light shadow-sm rounded-pill'>Add to Cart</button>
                      </form>
                     </div>
                </div>
                <div class='product info'>
                    <div class='product-name'>
                        <h3>" . $row["brand"] ." " . $row["type"] ."</h3>
                        <h3>" . $row["gender"] . "</h3>
                    </div>
                    
                    <div class='product-price'>
                    ₹ <span>" . $row["selling_price"] . "</span>
                    </div>
                </div>
                </div>
                
            </div>
            
        
    ";

  }

} else {
  echo "No results found.";
}

?>