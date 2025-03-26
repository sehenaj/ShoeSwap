<?php

//initiating session
session_start();

// checking if the user has logged in or not

if ($_SESSION["status"] === "active") {

    //storing user data

    include("session_storage.php");

    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


        <title>Wishlist</title>
        <link rel="icon" href="images/logo-round.png" type="image/x">
        <link rel="stylesheet" href="css/wishlist.css">
    </head>

    <body>
        <!-- -------------------------------Navbar-------------------------------->
        <!-- --------------------navbar---------------------- -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-nav sticky-top">
            <!-- Just an image -->

            <a class="navbar-brand" href="#">
                <img class="rounded-circle" src="images/logo.png" width="50" height="50" alt="">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <div class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="home.php">Home </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="wishlist.php">Wishlist<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="cart.php">Cart</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="myorder.php">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">Profile</a>
                        </li>
                    </div>

                    

                </ul>
                <form class="form-inline my-2 my-lg-0 " action="search.php" method="POST">
                    <!-- <input class="form-control mr-sm-2" name="search"type="search" placeholder="Search" aria-label="Search"> -->
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
                <button type="submit" class="btn button-primary"><a href="logout.php"><img src="images/icons/logout.png"
                            alt="" width="30px"></a></button>

            </div>
            
        </nav>
        <!-- --------------------navbar---------------------- -->
        <div class="card text-white bg-gradient-nav m-3">

            <div class="card-body">
                <h2 class="card-title">Wishlist</h2>
            </div>
        </div>
        <!-- -------------------------------Body-------------------------------->

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
        $sql = "SELECT s.id , s.brand, s.type, s.selling_price, s.image_url,s.purchase_price
        FROM wishlist w
        JOIN shoes s ON w.shoes_id = s.id
        WHERE w.user = '{$_SESSION['user']}'
        ";
        $result = $conn->query($sql);
        echo "<div class='container'>
            <div class='row'>";

        // Check if there are any rows returned
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

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
                    <form action='php/del_wishlist.php' method='post'>
                     <input type='hidden' name='product_id' value='" . $row["id"] . "'>
                        <button type='submit' class='btn btn-light rounded-pill text-decoration-none text-dark'><img src='images/icons/bin.png' width=15px alt=''></button>
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
                        <h3>" . $row["brand"] . " " . $row["type"] . "</h3>
                        
                    </div>
                    
                    <div class='product-price'>
                        $<span>" . $row["selling_price"] . "</span>
                    </div>
                    
                </div>
                </div>
                
            </div>
            
        
    ";

            }




        } else {
            echo "<img src='images/no_data.jpg' class='img-fluid'>";

        }
        echo " </div>

        </div>";
        $conn->close();
        ?>


        <!-- -------------------------------Body-------------------------------->
        <!-- -------------------------------footer-------------------------------->

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col">
                        <h4>Company</h4>
                        <ul>
                            <li><a href="#">Sholler Provides you a platform to Purchase you choice of shoe within your
                                    walltet.</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>contact</h4>
                        <ul>
                        <li><a href="#">PoliceLine, Burdwan , WB.</a></li>
                            <li><a href="#">033-12345678, 033-87654321</a></li>
                            <li><a href="#">sholler@gmail.com</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>useful link</h4>
                        <ul>
                            <li><a href="home.php">home</a></li>
                            <li><a href="myorder.php">order</a></li>
                            <li><a href="cart.php">cart</a></li>
                            <li><a href="dashboard.php">profile</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- Copyright -->
            <div class="text-center p-4" style="color:white;border-top:2px solid white;">
                © 2021 Copyright:
                Sholler.com
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
            crossorigin="anonymous"></script>

       
        <script src="js/custom.js"></script>
    </body>

    </html>



    <?php
} else {
    // if not logged then redirecting to login page
    header("Location: login.php");
    exit();

}

?>