<?php

//initiating session
session_start();

// checking if the user has logged in or not

if ($_SESSION["status"] === "active") {

    //storing user data

    include("session_storage.php");

    ?>



    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <title>Search</title>
        <link rel="icon" href="images/logo-round.png" type="image/x">
        <link rel="stylesheet" href="css/search.css">

    </head>

    <body>
        <!-- -------------------------------Navbar-------------------------------->
        <nav class="navbar navbar-expand-lg navbar-dark  bg-gradient-nav sticky-top">
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
                        <li class="nav-item ">
                            <a class="nav-link" href="wishlist.php">Wishlist</a>
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
        <!-- -------------------------------Banner-------------------------------->
        <div class="card text-white bg-gradient-nav m-3">

            <div class="card-body">
                <h2 class="card-title">Search Item</h2>
            </div>
            <hr style="background-color:white;">

            <!-- -------------------------------Card-------------------------------- -->

            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'sholler');
            // Initialize variables for search and filters
            $search_query = '';
            $size_filter = '';
            $min_price_filter = '';
            $max_price_filter = '';
            $gender_filter = '';
            $result = '';

            // Check if the form was submitted
            if (isset($_POST['submit'])) {
                // Get the search query and filters from the form
                $search_query = mysqli_real_escape_string($conn, $_POST['search']);
                $size_filter = mysqli_real_escape_string($conn, $_POST['size']);
                $min_price_filter = mysqli_real_escape_string($conn, $_POST['min_price']);
                $max_price_filter = mysqli_real_escape_string($conn, $_POST['max_price']);
                $gender_filter = mysqli_real_escape_string($conn, $_POST['gender']);

                // Validate the price range
                if (!empty($min_price_filter) && !empty($max_price_filter) && $max_price_filter < $min_price_filter) {
                    // Swap the values if the maximum price is less than the minimum price
                    $temp = $min_price_filter;
                    $min_price_filter = $max_price_filter;
                    $max_price_filter = $temp;
                }

                // Build the SQL query based on the search query and filters
                $sql = "SELECT * FROM shoes WHERE 1=1";

                if (!empty($search_query)) {
                    $sql .= " AND (brand LIKE '%$search_query%' OR type LIKE '%$search_query%' OR description LIKE '%$search_query%')";
                }

                if (!empty($size_filter)) {
                    $sql .= " AND size = '$size_filter'";
                }

                if (!empty($min_price_filter) && !empty($max_price_filter)) {
                    $sql .= " AND selling_price BETWEEN '$min_price_filter' AND '$max_price_filter'";
                }

                if (!empty($gender_filter)) {
                    $sql .= " AND gender = '$gender_filter'";
                }

                $result = mysqli_query($conn, $sql);
            }
            ?>



            <!-- Display the form -->
            <div id="filter">
                <form class="form-inline" action="" method="POST">
                    <label class="sr-only" for="search">Search:</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="search" name="search" placeholder="Search"
                        value="<?php echo $search_query; ?>">

                    <label class="sr-only" for="size">Size:</label>
                    <select class="form-control mb-2 mr-sm-2" name="size" id="size">
                        <option value="">All</option>
                        <?php
                        $sql_size = "SELECT DISTINCT size FROM shoes";
                        $result_size = mysqli_query($conn, $sql_size);

                        while ($row = mysqli_fetch_assoc($result_size)) {
                            $selected = ($size_filter == $row['size']) ? 'selected' : '';
                            echo "<option value='" . $row['size'] . "' $selected>" . $row['size'] . "</option>";
                        }
                        ?>
                    </select>

                    <label class="sr-only" for="min_price">Min Price:</label>
                    <input type="number" class="form-control mb-2 mr-sm-2" id="min_price" name="min_price"
                        placeholder="Min Price" value="<?php echo $min_price_filter; ?>">

                    <label class="sr-only" for="max_price">Max Price:</label>
                    <input type="number" class="form-control mb-2 mr-sm-2" id="max_price" name="max_price"
                        placeholder="Max Price" value="<?php echo $max_price_filter; ?>">

                    <label class="sr-only" for="gender">Gender:</label>
                    <select class="form-control mb-2 mr-sm-2" name="gender" id="gender">
                        <option value="">All</option>
                        <option value="male" <?php if ($gender_filter === 'male')
                            echo 'selected'; ?>>Male</option>
                        <option value="Female" <?php if ($gender_filter === 'Female')
                            echo 'selected'; ?>>Female</option>
                        <option value="Kids" <?php if ($gender_filter === 'Kids')
                            echo 'selected'; ?>>Kids</option>
                    </select>

                    <input type="submit" class="btn btn-primary mb-2" name='submit' value='Filter'>
                </form>

            </div>

            <!-- The div under this is for the search box container -->
        </div>

        <?php
        if (is_string($result)) {
            // The query failed
    
        } else {
            ?>
            <div class="container">
                <div class="row">

                    <?php

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                            $purchasePrice = $row['purchase_price'];
                            $sellingPrice = $row['selling_price'];
                            $discountPercentage = round((($purchasePrice - $sellingPrice) / $purchasePrice) * 100);





                            echo "
            <div class='col-lg-3 col-md-4 mb-3'>
                <div class='product-box'>
                <div class='product-inner-box position-relative'>
                    <div class='icons position-absolute'>
                    <form action='product_page.php' target='_blank' method='post'>
                     <input type='hidden' name='product_id' value='" . $row["id"] . "'>
                     <button type='submit' class='btn btn-light rounded-pill text-decoration-none text-dark'><img src='images/icons/eye.png' width=15px alt=''></button>
                      </form>
                    <form action='php/cancel_order.php' method='post'>
                     <input type='hidden' name='product_id' value='" . $row["id"] . "'>
                        <button type='submit' class='btn btn-light rounded-pill text-decoration-none text-dark'><img src='images/icons/bin.png' width=15px alt=''></button>
                    </form>
                    </div>
                    <div class='onsale'>
                        <span class='badge badge-rounded-0'>".$discountPercentage."%</span>
                    </div>
                     <img src='seller/php/" . $row['image_url'] . "' alt=''id='product-img' class='img-fluid img-item'>
                      
                     <div class='cart-btn'>
                        <button class='btn btn-light shadow-sm rounded-pill'>Add to Cart</button>
                     </div>
                </div>
                <div class='product info'>
                    <div class='product-name'>
                        <h3>" . $row["brand"] . " " . $row["type"] . "</h3>
                        <h3>" . $row["gender"] . "</h3>
                    </div>
                    
                    <div class='product-price'>
                    <span>₹ " . $row["selling_price"] . "</span>
                    </div>
                </div>
                </div>
                
            </div>
            
        
    ";


                        }
                    } else {
                        echo "<img src='images/no_data.jpg' class='img-fluid'>";
                    }
                    echo "</div>

</div>";
                    $conn->close();
        }
        ?>

                <!-- -------------------------------footer-------------------------------->
                <footer class="footer">
                    <div class="container">
                        <div class="row">
                            <div class="footer-col">
                                <h4>Company</h4>
                                <ul>
                                    <li><a href="#">Sholler Provides you a platform to Purchase you choice of shoe within
                                            your walltet.</a></li>
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