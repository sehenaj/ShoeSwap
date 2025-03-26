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


        <title>cart</title>
        <link rel="stylesheet" href="css/cart.css">
        <link rel="icon" href="images/logo-round.png" type="image/x">
        <script src="js/cart.js"></script>
        <style>
            .gradient-custom {
                /* fallback for old browsers */
                background: #6a11cb;

                /* Chrome 10-25, Safari 5.1-6 */
                background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

                /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
            }
        </style>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    </head>

    <body>

        <!-- -------------------------------Navbar-------------------------------->
        <!-- --------------------navbar---------------------- -->
        <nav class="navbar navbar-expand-lg navbar-dark  sticky-top" style="color:white;background-color:black;">
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
                        <li class="nav-item active">
                            <a class="nav-link" href="cart.php">Cart<span class="sr-only">(current)</span></a>
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
                <h2 class="card-title">Cart</h2>
            </div>
        </div>
        <!-- -------------------------------Body-------------------------------->
        <section class="h-100 gradient-custom">
            <div class="container py-5">
                <div class="row d-flex justify-content-center my-4">
                    <div class="col-md-7">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">Cart -
                                    <?php $totalItemsResult = $conn->query("SELECT COUNT(*) AS total_items FROM cart WHERE user='{$_SESSION['user']}'");
                                    $totalItems = ($totalItemsResult->num_rows > 0) ? $totalItemsResult->fetch_assoc()["total_items"] : 0;
                                    echo $totalItems;
                                    ?>
                                    items
                                </h5>

                            </div>
                            <div class="card-body">
                                <?php

                                // Retrieve shoe data from database
                                $sql = "SELECT s.id ,s.gender,s.size, s.brand, s.selling_price, s.image_url,s.purchase_price
                                FROM cart c
                                JOIN shoes s ON c.shoes_id = s.id
                                WHERE c.user ='{$_SESSION['user']}'";
                                $result = $conn->query($sql);

                                echo "<div class='container'>";

                                // Check if there are any rows returned
                                if ($result->num_rows > 0) {

                                    while ($row = $result->fetch_assoc()) {
                                        ?>


                                        <div class="row">
                                            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                                <!-- Image -->
                                                <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                                    data-mdb-ripple-color="light">
                                                    <img src="<?php echo "seller/php/" . $row["image_url"] . ""; ?>" class="w-100"
                                                        alt="Product_image" />
                                                    <a href="#!">
                                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                                    </a>
                                                </div>
                                                <!-- Image -->
                                            </div>

                                            <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                                <!-- Data -->
                                                <p><strong>
                                                        <?php echo " " . $row["brand"] . ""; ?>
                                                    </strong></p>
                                                <p>
                                                    <?php echo "Gender: " . $row["gender"] . ""; ?>
                                                </p>
                                                <p>
                                                    <?php echo "Size " . $row["size"] . ""; ?>
                                                </p>
                                                <form action='product_page.php' method='post'>
                                                    <input type='hidden' name='product_id'
                                                        value="<?php echo "" . $row["id"] . ""; ?>">
                                                    <button type='submit' class='class="btn btn-primary btn-sm me-1 mb-2'
                                                        data-mdb-toggle="tooltip" title="Remove item"><img
                                                            src='images/icons/eye.png' width=15px alt=''></button>
                                                </form>
                                                <form action='php/cancel_order.php' method='post'>
                                                    <input type='hidden' name='product_id'
                                                        value="<?php echo "" . $row["id"] . ""; ?>">
                                                    <button type='submit' class='class="btn btn-danger btn-sm me-1 mb-2'
                                                        data-mdb-toggle="tooltip" title="Remove item"><img
                                                            src='images/icons/bin.png' width=15px alt=''></button>
                                                </form>
                                                <!-- Data -->
                                            </div>

                                            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">

                                                <!-- Price -->
                                                <p class="text-start text-md-center">
                                                    <strong>
                                                        <?php echo "₹ " . $row["selling_price"] . ""; ?>
                                                    </strong>
                                                </p>
                                                <!-- Price -->

                                            </div>
                                        </div>
                                        <hr>


                                        <?php

                                    }
                                } else {

                                    echo "<img src='images/no_data.jpg' class='img-fluid'>";

                                }
                                echo " </div>

        ";



                                ?>
                            </div>
                        </div>
                        <?php if ($totalItems > 0): ?>
                            <?php
                            $currentDate = date('d.m.Y');
                            $deliveryStartDate = date('d.m.Y', strtotime('+7 days'));
                            $deliveryEndDate = date('d.m.Y', strtotime('+9 days'));
                            ?>

                            <div class="card mb-4">
                                <div class="card-body">
                                    <p><strong>Expected shipping delivery</strong></p>
                                    <p class="mb-0">
                                        <?php echo $deliveryStartDate . ' - ' . $deliveryEndDate; ?>
                                    </p>
                                </div>
                            </div>

                        <?php endif; ?>

                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body">
                                <p><strong>We accept</strong></p>
                                <img class="me-2" width="45px" src="images/visa.png" alt="Visa" />
                                <img class="me-2" width="45px" src="images/paytm.png" alt="American Express" />
                                <img class="me-2" width="45px" src="images/paypal.png" alt="PayPal acceptance mark" />
                            </div>
                        </div>
                    </div>
                    <div class="card bg-primary text-white rounded-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="mb-0">Card details</h5>

                            </div>

                            <span id="card-detail-error" style="color:yellow;"></span>
                            <form action='' class="mt-4" method="POST" id="paymentform" onsubmit="return validateFormnow()">

                                <div class="form-outline form-white mb-4">
                                    <input type="text" id="typeName" class="form-control form-control-lg" size="17" name="card-name"
                                        placeholder="Cardholder's Name" />
                                    <label class="form-label" for="typeName">Cardholder's Name</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="text" id="typeText" name="card-number" class="form-control form-control-lg" size="17"
                                        placeholder="1234 5678 9012 3457" minlength="16" maxlength="16" />
                                    <label class="form-label" for="typeText">Card Number</label>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-outline form-white">
                                            <input type="text" id="typeExp" class="form-control form-control-lg"
                                                placeholder="MMYY" size="4" id="exp" minlength="4" maxlength="4" name="card-expiry" />
                                            <label class="form-label" for="typeExp">Expiration</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline form-white">
                                            <input type="password" id="typeCVV" class="form-control form-control-lg"
                                                placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" name="card-cvv" />
                                            <label class="form-label" for="typeCVV">CVV</label>
                                            <input type='hidden' name='product_id' value='" . $row["id"] . "'>
                                        </div>
                                    </div>
                                </div>



                                <hr class="my-4">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Shipping</p>
                                    <p class="mb-2">
                                        <?php echo "" . $_SESSION['user'] . ""; ?>
                                    </p>
                                </div>


                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Subtotal</p>
                                    <p class="mb-2">
                                        <?php echo "₹" . ($conn->query("SELECT SUM(s.purchase_price) AS total_purchase_price FROM cart c JOIN shoes s ON c.shoes_id = s.id WHERE c.user = '{$_SESSION['user']}';")->fetch_assoc()["total_purchase_price"] ?? 0); ?>
                                    </p>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Discount</p>
                                    <p class="mb-2">
                                        <?php // Assuming you have the selling price available in the "cart" table
                                            $result = $conn->query("SELECT
                                            SUM(s.purchase_price) AS total_purchase_price,
                                            SUM(s.selling_price) AS total_selling_price
                                          FROM
                                            cart c
                                          JOIN
                                            shoes s
                                          ON
                                            c.shoes_id = s.id
                                          WHERE
                                            c.user = '{$_SESSION['user']}';
                                          ");
                                            $row = $result->fetch_assoc();

                                            $totalPurchasePrice = $row["total_purchase_price"] ?? 0;
                                            $totalSellingPrice = $row["total_selling_price"] ?? 0;

                                            $discount = $totalPurchasePrice - $totalSellingPrice;

                                            echo "₹" . $discount;
                                            ?>
                                    </p>
                                </div>

                                <div class="d-flex justify-content-between mb-4">
                                    <p class="mb-2">Total(Incl. taxes)</p>
                                    <p class="mb-2">
                                        <?php echo "₹" . ($conn->query("SELECT SUM(s.selling_price) AS total_purchase_price FROM cart c JOIN shoes s ON c.shoes_id = s.id WHERE c.user = '{$_SESSION['user']}'")->fetch_assoc()["total_purchase_price"] ?? 0); ?>
                                    </p>
                                </div>
                                <button type="submit" data-toggle="modal" data-target="#exampleModalCenter"
                                    class="btn btn-info btn-block btn-lg">
                                    <div class="d-flex justify-content-between">
                                        <span>
                                            <?php echo "₹" . ($conn->query("SELECT SUM(s.selling_price) AS total_purchase_price FROM cart c JOIN shoes s ON c.shoes_id = s.id WHERE c.user = '{$_SESSION['user']}'")->fetch_assoc()["total_purchase_price"] ?? 0); ?>
                                        </span>
                                        <span>Checkout </span>
                                    </div>
                                </button>
                            </form>
                            <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $cardname=$_POST['card-name'];
                                $cardnumber=$_POST['card-number'];
                                $cardexpiry=$_POST['card-expiry'];
                                $cardcvv=$_POST['card-cvv'];
                                // Retrieve data from the cart table
                                $sql = "SELECT * FROM cart WHERE user='{$_SESSION['user']}'";
                                $result = $conn->query($sql);

                                // Check if there are any rows returned
                                if ($result->num_rows > 0) {
                                    // Loop through the rows and add them to the order table
                                    while ($row = $result->fetch_assoc()) {
                                        // Extract the relevant data from the $row array and add it to the order table
                        
                                        // Add the data to the order table using an appropriate SQL insert query
                                        // Replace 'order_table' with the actual name of your order table
                                        $insertQuery = "INSERT INTO `order` (shoes_id,user)
                                            VALUES ('" . $row['shoes_id'] . "', '" . $_SESSION['user'] . "')";

                                        // Execute the insert query
                                        $insertResult = $conn->query($insertQuery);
                                        $orderid=$conn->insert_id;
                                        $conn->query("UPDATE shoes
                                            SET status = 'sold'
                                            WHERE id = " . $row['shoes_id'] . "");



                                    }
                                    if ($insertResult) {
                                        $conn->query("TRUNCATE TABLE cart");
                                        $insertPayment ="INSERT INTO payment (card_name, card_number, card_expiry, card_cvv, order_id)
                                        VALUES ('$cardname', '$cardnumber', '$cardexpiry', '$cardcvv', $orderid)";
                                        $conn->query($insertPayment);
                                       

                                        ?>

                                        <script>
                                            alert(" Payment Sucess.\nSuccessfully Purchased.");
                                            setTimeout(function () {
                                                window.location.href = 'myorder.php';
                                            }, 50); // 5000 milliseconds = 5 seconds
                                        </script>
                                            

                                        
                                        <?php
                                        
                                    } else {
                                        ?>
                                        <script>
                                            alert("Server Down, Try Later.");
                                        </script>
                                        <?php
                                    }

                                }
                            }
                            ?>


                        </div>
                    </div>





                </div>
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
        <!-- Optional JavaScript; choose one of the two! -->


        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
            crossorigin="anonymous"></script>




        <script src="js/card.js"></script>
    </body>

    </html>



    <?php
} else {
    // if not logged then redirecting to login page
    header("Location: login.php");
    exit();

}

?>