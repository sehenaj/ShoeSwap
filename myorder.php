<?php

//initiating session
session_start();

// checking if the user has logged in or not

if ($_SESSION["status"] === "active") {

    //storing user data

    include("session_storage.php");
    // Calculate total price and offer price of selected items
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sholler";

    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


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


        <title>Orders</title>
        <link rel="icon" href="images/logo-round.png" type="image/x">
        <link rel="stylesheet" href="css/cart.css">


    </head>

    <body>
        <!-- -------------------------------Navbar-------------------------------->
        <!-- --------------------navbar---------------------- -->
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
                        <li class="nav-item active">
                            <a class="nav-link" href="myorder.php">Orders<span class="sr-only">(current)</span></a>
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
                <h2 class="card-title">My Orders</h2>
            </div>
        </div>
        <!-- -------------------------------Body-------------------------------->
        <section style="background-color: #eee;">
            <div class="container py-5">
                <?php

                // Retrieve shoe data from database
                $sql = "SELECT s.id ,s.type,s.shoe_usage,s.category,s.description,s.gender,s.size, s.brand, s.selling_price, s.image_url,s.purchase_price,o.created_date
                FROM `order` o
                JOIN shoes s ON o.shoes_id = s.id
                WHERE o.user ='{$_SESSION['user']}'";
                $result = $conn->query($sql);

                echo "<div class='container'>";

                // Check if there are any rows returned
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-12 col-xl-10">
                                <div class="card shadow-0 border rounded-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                                <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                                    <img src="<?php echo "seller/php/" . $row["image_url"] . ""; ?>"
                                                        class="w-100" />
                                                    <a href="#!">
                                                        <div class="hover-overlay">
                                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);">
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                                <h5>
                                                    <?php echo "" . $row["brand"] . " " . $row["type"] . ""; ?>
                                                </h5>

                                                <div class="mt-1 mb-0 text-muted small">
                                                    <span>
                                                        <?php echo "For " . $row["gender"] . ""; ?>
                                                    </span>
                                                    <span class="text-primary"> • </span>
                                                    <span>
                                                        <?php echo " " . $row["shoe_usage"] . " old"; ?>
                                                    </span>
                                                    <span class="text-primary"> • </span>
                                                    <span>
                                                        <?php echo "" . $row["category"] . ""; ?><br />
                                                    </span>
                                                </div>

                                                <p>
                                                    <?php echo "Description: " . $row["description"] . ""; ?>
                                                </p>
                                                <form action="review.php" method="POST" target="_blank">
                                                    <input type="hidden" name="product_id" value="<?php echo $row["id"]; ?>">
                                                    <button type="submit" class="btn btn-outline-primary btn-sm mt-2"
                                                        name="Review">Review</button>
                                                </form>


                                            </div>
                                            <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                                <div class="d-flex flex-row align-items-center mb-1">
                                                    <h4 class="mb-1 me-1">
                                                        <?php echo "₹ " . $row["selling_price"] . ""; ?>
                                                    </h4>
                                                    <span class="text-danger"><s>
                                                            <?php echo"₹" . $row["purchase_price"] . ""; ?>
                                                        </s></span>
                                                </div>
                                                <h6 class="text-success">Free shipping</h6>
                                                <div class="d-flex flex-column mt-4">
                                                    <button class="btn btn-primary btn-sm" type="button">
                                                        <?php
                                                        $currentDate = date("Y-m-d");
                                                        $createdDate = $row['created_date'];

                                                        $status = (strtotime($currentDate) > strtotime($createdDate . ' + 7 days')) ? 'Delivered' : 'Item on Way';

                                                        echo $status;
                                                        ?>
                                                    </button>
                                                    <form action="pdf.php" method="POST">
                                                        <input type="hidden" name="product_id" value="<?php echo $row["id"]; ?>">
                                                        <input type="hidden" name="brand" value="<?php echo $row["brand"]; ?>">
                                                        <input type="hidden" name="type" value="<?php echo $row["type"]; ?>">
                                                        <input type="hidden" name="category"
                                                            value="<?php echo $row["category"]; ?>">
                                                        <input type="hidden" name="shoe_usage"
                                                            value="<?php echo $row["shoe_usage"]; ?>">

                                                        <input type="hidden" name="gender" value="<?php echo $row["gender"]; ?>">
                                                        <input type="hidden" name="order_created"
                                                            value="<?php echo $row["created_date"]; ?>">
                                                        <input type="hidden" name="size" value="<?php echo $row["size"]; ?>">
                                                        <input type="hidden" name="purchasing_price"
                                                            value="<?php echo $row["purchase_price"]; ?>">
                                                        <input type="hidden" name="selling_price"
                                                            value="<?php echo $row["selling_price"]; ?>">
                                                        <button type="submit"
                                                            class="btn btn-outline-primary btn-sm mt-2">Invoice</button>
                                                    </form>
                                                    <?php if ($status == 'Item on Way') {
                                                        ?>
                                                        <form action="" method="POST">
                                                        <input type='hidden' name='product_id'
                                                        value="<?php echo "" . $row["id"] . ""; ?>">
                                                            <button type="submit" class="btn btn-outline-danger btn-sm mt-2"
                                                                name="cancel">Cancel</button>
                                                        </form>

                                                        <?php
                                                        if (isset($_POST['cancel'])) {
                                                            if (isset($_POST['cancel'])) {
                                                                $shoeId = $_POST['product_id'];
                                                                $sql = "UPDATE `shoes` SET `status` = 'LISTED' WHERE `id` = '" . $_POST["product_id"] . "'";
                                                                $result = $conn->query($sql);

                                                                if ($result) {
                                                                    // Delete the item from the order table
                                                                    
                                                                    $deleteSql = "DELETE FROM `order` WHERE `shoes_id` = $shoeId";
                                                                    $deleteResult = $conn->query($deleteSql);

                                                                    if ($deleteResult) {
                                                                        ?>
                                                                        <script>
                                                                            setTimeout(function () {
                                                                                window.location.href = 'myorder.php';
                                                                            }, 100); // 5000 milliseconds = 5 seconds
                                                                        </script>
                                                                        <?php
                                                                    } else {
                                                                        echo '<div class="alert alert-danger mt-2">Failed to cancel the order.</div>';
                                                                    }
                                                                } else {
                                                                    echo '<div class="alert alert-danger mt-2">Failed to update the shoe status.</div>';
                                                                }
                                                            }

                                                        }
                                                        ?>

                                                        <?php
                                                    }

                                                    ?>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

                    }
                } else {
                    echo "<img src='images/no_data.jpg' class='img-fluid'>";
                }
                echo " </div>

        ";



                ?>
            </div>
        </section>

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

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
            crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
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

<!-- // <div class='col-lg-3 col-md-4 mb-3'>
//      Add checkbox here
//     <div class='form-check'>
//         <input class='form-check-input' type='checkbox' name='selected_products[]' value='" . $row["id"] . "' data-selling-price='" . $row["selling_price"] . "' data-purchase-price='" . $row["purchase_price"] . "'>
//     </div>
//     <div class='product-box'>
//         <div class='product-inner-box position-relative'>
//             <div class='icons position-absolute'>
//                 <form action='product_page.php' target='_blank' method='post'>
//                     <input type='hidden' name='product_id' value='" . $row["id"] . "'>
//                     <button type='submit' class='btn btn-light rounded-pill text-decoration-none text-dark'><img src='images/icons/eye.png' width=15px alt=''></button>
//                 </form>
//                 <form action='php/cancel_order.php' method='post'>
//                     <input type='hidden' name='product_id' value='" . $row["id"] . "'>
//                     <button type='submit' class='btn btn-light rounded-pill text-decoration-none text-dark'><img src='images/icons/bin.png' width=15px alt=''></button>
//                 </form>
//             </div>
//             <div class='onsale'>
//                 <span class='badge badge-rounded-0'><i class='fa-light fa-arrow-down-long'></i> 29%</span>
//             </div>
//             <img src='seller/php/" . $row['image_url'] . "' alt=''id='product-img' class='img-fluid img-item'>
//             <div class='cart-btn'>
//                 <button class='btn btn-light shadow-sm rounded-pill'>Add to Cart</button>
//             </div>
//         </div>
//         <div class='product info'>
//             <div class='product-name'>
//                 <h3>" . $row["brand"] . "</h3>
//                 <h3>" . $row["gender"] . "</h3>
//                 <h3>" . $row["shoe_usage"] . "</h3>
//             </div>
//             <div class='product-price'>
//                 $<span>" . $row["selling_price"] . "</span>
//             </div>
//         </div>
//     </div>
// </div> -->