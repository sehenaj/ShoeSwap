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
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
        <link rel="stylesheet" href="css/dashboard.css">
        <link rel="icon" href="images/logo-round.png" type="image/x">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    </head>

    <body>
        <!-- -------------------------------Navbar-------------------------------->
        <nav id="navbar">
            <div class="logo">
                <img src="images\logo.jpeg" alt="LOGO">

            </div>
            <div class="nav_items">
                <ul>
                    <li class="item"><a href="homepage_seller.php">Home</a></li>
                    <li class="item"><a href="ordered_seller.php">Order</a> </li>

                    <li class="item"><a href="#">Dashboard</a> </li>
                    <li class="item"><a href="Logout.php">Logout</a> </li>
                </ul>
            </div>
        </nav>
        <!-- -------------------------------Body-------------------------------->
        <section id="dashboard">
            <h1>My Profile</h1>
            <div class="dash-body">
                <div class="dash-img">
                    <img src="images/members.png" alt="">
                    <h2>
                        <?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?>
                    </h2>
                </div>

                <div class="dash-details">
                    <div class="information">
                        <h3>Information</h3>
                        <h4>Address:
                            <?php echo $_SESSION['address']; ?>
                        </h4>
                        <h4>City:
                            <?php echo $_SESSION['city']; ?>
                        </h4>
                        <h4>Pin:
                            <?php echo $_SESSION['pin']; ?>
                        </h4>
                    </div>
                    <div class="information">
                        <h3>Contact</h3>
                        <h4>Phone:
                            <?php echo $_SESSION['phone']; ?>
                        </h4>
                        <h4>Email:
                            <?php echo $_SESSION['email']; ?>
                        </h4>
                    </div>
                    <div class="information">
                        <h3>Security Question:</h3>
                        <h4>
                            <?php echo $_SESSION['security']; ?>
                        </h4>
                    </div>
                </div>

        </section>
        <section style="background-color: grey;">

            <div class="row d-flex justify-content-center">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="container my-5 py-5">
                            <?php
                            include('../auth/database.php');
                            $conn = new mysqli($host, $username, $password, "sholler");
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            // Retrieve shoe data from database
                            $sql = "SELECT * FROM comment WHERE seller = '" . $_SESSION['user'] . "'";
                            $result = $conn->query($sql);
                           // Check if there are any rows returned
            if ($result === false) {
              
                ?>
                
                <div class="alert alert-success" role="alert">
                  No Review, New Seller
                </div>
                
                <?php
            
        } else {
  
          // Check if there are any rows returned
          if ($result->num_rows > 0) { ?>
            
              <div class="alert alert-success" role="alert">
                Seller Review
              </div>
              <?php
  
              while ($row = $result->fetch_assoc()) {
                ?>
                <hr>
                <div class="card-body">
                  <div class="d-flex flex-start align-items-center">
                    <img class="rounded-circle shadow-1-strong me-3" src="images/user.png" alt="avatar" width="60"
                      height="60" />
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
} else {
    // if not logged then redirecting to login page
    header("Location: login.php");
    exit();

}

?>