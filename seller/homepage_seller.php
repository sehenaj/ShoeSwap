<?php 

//initiating session
session_start();

// checking if the user has logged in or not

if($_SESSION["status"]==="active"){

    //storing user data

    include("session_storage.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="css/selling-nav-style.css">
    <link rel="icon" href="images/logo-round.png" type="image/x">
</head>
<body>
    <!-- -------------------------------Navbar-------------------------------->
    <nav id="navbar">
        <div class="logo">
            <img src="images\logo.jpeg" alt="LOGO">
        </div>
        <div class="nav_items">
            <ul>
                <li class="item"><a href="#">Home</a></li>
                <li class="item"><a href="ordered_seller.php">Order</a> </li>
                
                <li class="item"><a href="dashboard.php">Dashboard</a></li>
                <li class="item"><a href="Logout.php">Logout</a> </li>
            </ul>
        </div>
    </nav>
    <!-- -------------------------------Body-------------------------------->
    <div class="card-heading">
        <h1>Items Listed </h1>
        <div class="card-button">
            <a href="choice_seller.html"><button class="adding-item">Add Item</button></a>
        </div>
    </div>
    
    
    <section id="cards" >
    
    
     <?php include('php/shoe_seller.php'); ?> 
    
    
    </section>
    


    <!-- -------------------------------Body-------------------------------->
    <!-- -------------------------------footer-------------------------------->
    <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col">
                        <h4>Company</h4>
                        <ul>
                            <li><a href="#">Sholler Provides you a platform to Sell your choice of shoe and to fill your
                                    walttet.</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>contact</h4>
                        <ul>
                            <li><a href="#">PoliceLine, Burdwan, WB</a></li>

                            <li><a href="#">sholler@gmail.com</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>useful link</h4>
                        <ul>
                            <li><a href="homepage_seller.php">home</a></li>
                            <li><a href="ordered_seller.php">order</a></li>
                            <li><a href="dashboard.php">Profile</a></li>

                        </ul>
                    </div>

                </div>
            </div>
        </footer>
</body>
</html>

<?php
}
else{
    // if not logged then redirecting to login page
    header("Location: login.php");
    exit();

}

?>