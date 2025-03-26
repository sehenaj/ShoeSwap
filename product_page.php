<?php

//initiating session
session_start();

// checking if the user has logged in or not

if ($_SESSION["status"] === "active") {

  //storing user data

  include("session_storage.php");
  $host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sholler";

  $conn = new mysqli($host, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


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
    <link rel="stylesheet" href="css/product_page.css">
    <title>Product</title>
    <link rel="icon" href="images/logo-round.png" type="image/x">
  </head>

  <body>
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
        <button type="submit" class="btn button-primary"><a href="logout.php"><img src="images/icons/logout.png" alt=""
              width="30px"></a></button>

      </div>
    </nav>
    <!-- ------------------------------navigation----------------- -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Product</li>

      </ol>
    </nav>
    <!-- ----------------------------breadcrum-------------------- -->



    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $product_id = $_POST['product_id'];

    }
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
    $sql = "SELECT * FROM shoes  WHERE id='{$product_id}'";
    $result = $conn->query($sql);
    echo "<div class='container'>
            <div class='row'>";

    // Check if there are any rows returned
    if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {
        $seller_name = $row['seller_name'];
        echo "<div class='container'>
        <div class='row'>
            <div class='col-md-5 '>
                <div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>
                    <ol class='carousel-indicators'>
                      <li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>
                      <li data-target='#carouselExampleIndicators' data-slide-to='1'></li>
                      <li data-target='#carouselExampleIndicators' data-slide-to='2'></li>
                    </ol>
                    <div class='carousel-inner'>
                      <div class='carousel-item active'>
                        <img src='seller/php/" . $row["image_url"] . "' class='img-fluid d-block w-100' alt='...'>
                      </div>
                      <div class='carousel-item'>
                        <img src='seller/php/" . $row["image_url_f"] . "' class='img-fluid d-block w-100' alt='...'>
                      </div>
                      <div class='carousel-item'>
                        <img src='seller/php/" . $row["image_url_s"] . "' class='img-fluid d-block item-img w-100' alt='...'>
                      </div>
                    </div>
                    <button class='carousel-control-prev' type='button' data-target='#carouselExampleIndicators' data-slide='prev'>
                      <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                      <span class='sr-only'>Previous</span>
                    </button>
                    <button class='carousel-control-next' type='button' data-target='#carouselExampleIndicators' data-slide='next'>
                      <span class='carousel-control-next-icon' aria-hidden='true'></span>
                      <span class='sr-only'>Next</span>
                    </button>
                  </div>

            </div>
            <div class='col-md-7'>
                <p class='newarrival text-center'>NEW</p>
                <h2>" . $row["brand"] . "</h2>
                <p>Product type: " . $row["type"] . "</p>
                <p class='price'>₹ " . $row["selling_price"] . '  ' . "<span style='text-decoration:line-through;margin-left:10px;'>  ₹" . $row["purchase_price"] . "</span></p>
                
                <p>Gender : " . $row["gender"] . "</p>
                <p>Shoe Usage : " . $row["shoe_usage"] . "</p>
                <p>Category : " . $row["category"] . "</p>
                <p>Description: " . $row["description"] . "</p>

                <div class='button-container'>
                <form action='php/add_to_order.php' method='post'>
                  <input type='hidden' name='product_id' value='" . $row["id"] . "'>
                  <button type='submit' class='btn btn-primary''>
                      Add to Cart
                  </button>
                </form>
                <form action='php/add_to_wishlist.php' method='post'>
                  <input type='hidden' name='product_id' value='" . $row["id"] . "'>
                  <button type='submit' class='btn btn-primary''>
                      Add to Wishlist
                  </button>
                </form>
                </div>
            </div>
        </div>
      </div>";
      }
    }


    ?>
    </div>
    </div>


    <section style="background-color: #eee;">

      <div class="row d-flex justify-content-center">
        <div class="col-md-12 ">
          <div class="card">
          <div class="container my-5 py-5">



            <?php

            // Retrieve shoe data from database
            $sql = "SELECT c.comment, c.user, c.comment_time, s.seller_name
                            FROM comment c
                            JOIN shoes s ON c.shoes_id = s.id
                            WHERE c.seller = (SELECT seller_name FROM shoes WHERE id =$product_id)
                            ";
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



 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
      crossorigin="anonymous"></script>

 
  </body>

  </html>


  <?php
} else {
  // if not logged then redirecting to login page
  header("Location: login.php");
  exit();

}

?>