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


        <title>Review</title>
        <link rel="stylesheet" href="css/cart.css">
        <link rel="icon" href="images/logo-round.png" type="image/x">
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
        
        <div class="card text-white bg-gradient-nav m-3">

            <div class="card-body">
                <h2 class="card-title">Review</h2>
            </div>
        </div>
        
        <!-- -------------------------------Body-------------------------------->
        <?php
        if (isset($_POST['Review'])) {
            // Check if the form is submitted
    
            // Retrieve the value of product_id
            
            $_SESSION['product_id']= $_POST['product_id'];

            // You can now use the $product_id variable for further processing or database operations
    
        }
        ?>


        <section style="background-color: #eee;">
            <div class="container my-5 py-5">
            <div class="alert alert-success" role="alert">
           We protect Seller's Privacy, hence You are Seeing Review of Seller you bought from.
        </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 ">
                        <div class="card">


                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                <form action="php/review_creation.php" method="POST">
                                    <!-- Add the form element with the appropriate action and method attributes -->
                                    <div class="d-flex flex-start w-100">
                                        <img class="rounded-circle shadow-1-strong me-3" src="images/user.png" alt="avatar"
                                            width="40" height="40" />
                                        <div class="form-outline w-100">
                                            <textarea class="form-control" name="comment" id="textAreaExample" rows="4"
                                                style="background: #fff;"></textarea>
                                            <label class="form-label" for="textAreaExample">Message</label>
                                        </div>
                                    </div>
                                    <div class="float-end mt-2 pt-1">
                                        <input type="hidden" name="product_id" value=<?php echo $_SESSION['product_id']; ?>>
                                        <!-- Add a hidden input field to pass the product ID -->
                                        <button type="submit" class="btn btn-primary btn-sm" name="submit_comment">Post
                                            comment</button>
                                        <!-- Change the button type to submit and add a name attribute -->
                                        <button type="button" class="btn btn-outline-primary btn-sm"
                                            onclick="clearTextArea()">Cancel</button>
                                    </div>
                                </form>
                                <script>
                                    function clearTextArea() {
                                        document.getElementById("textAreaExample").value = "";
                                    }
                                </script>
                            </div>


                            <?php

                            // Retrieve shoe data from database
                            $sql = "SELECT c.comment, c.user, c.comment_time, s.seller_name
                            FROM comment c
                            JOIN shoes s ON c.shoes_id = s.id
                            WHERE c.seller = (SELECT seller_name FROM shoes WHERE id =".$_SESSION['product_id'].")
                            ";
                            $result = $conn->query($sql);



                            // Check if there are any rows returned
                            if ($result->num_rows > 0) {

                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <div class="card-body">
                                        <div class="d-flex flex-start align-items-center">
                                            <img class="rounded-circle shadow-1-strong me-3" src="images/user.png" alt="avatar"
                                                width="60" height="60" />
                                            <div>
                                                <h6 class="fw-bold text-primary mb-1">
                                                    <?php echo $row['user']; ?>
                                                </h6>
                                                <p class="text-muted small mb-0">
                                                    Shared publicly -
                                                    <?php echo $row['comment_time']; ?>
                                                </p>
                                            </div>
                                        </div>

                                        <p class="mt-3 mb-4 pb-2">
                                            <?php echo $row['comment']; ?>
                                        </p>
                                    </div>
                                    <?php


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
                            <li><a href="#">policeline,Burdwan,Westbengal</a></li>
                            <li><a href="#">Sholler@gmail.com</a></li>
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