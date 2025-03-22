<?php
include("auth/database.php");
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

        <title>Homepage</title>
        <link rel="icon" href="images/logo-round.png" type="image/x">
        <link rel="stylesheet" href="css/home.css">

    </head>

    <body>

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
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
        <!-- --------------------navbar---------------------- -->
        <!-- --------------------Crousel---------------------- -->
        <div id="carouselExampleIndicators" class="carousel slide crousel-h" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

            </ol>
            <div class="carousel-inner h-10">
                <div class="carousel-item active">
                    <img src="images/banner/banner1.png" class="d-block w-100 img-fluid" height="100px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/banner/banner3.png" class="d-block w-100 img-fluid" height="100px" alt="...">
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>

        <!-- --------------------Crousel---------------------- -->
        <div class="card text-white bg-gradient-nav m-3">

            <div class="card-body">
                <h5 class="card-title">Fresh Recommendations</h5>
            </div>
        </div>

        <!-- --------------------card---------------------- -->


    
        <div class='container' id="item_section">
            <div class='row'>
                <?php include('php/shoe.php'); ?>

            </div>

        </div>

        <!-- --------------------card---------------------- -->
        <div class="card text-white bg-gradient-nav m-3">

            <div class="card-body">
                <h5 class="card-title">REVIEWS</h5>
            </div>
        </div>

        <!-- --------------------Reviews---------------------- -->
        <section style="margin:20px;">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-xl-8 text-center">
                    <h3 class="mb-4">Sholler</h3>
                    <p class="mb-4 pb-2 mb-md-5 pb-md-0">
                    "Discover the Essence of Style and Quality. Sholler - Where Fashion Meets Excellence."
                    </p>
                </div>
            </div>

            <div class="row text-center d-flex align-items-stretch">
                <div class="col-md-4 mb-5 mb-md-0 d-flex align-items-stretch">
                    <div class="card testimonial-card">
                        <div class="card-up" style="background-color: #9d789b;"></div>
                        <div class="avatar mx-auto bg-white">
                            <img src="images/profile/tanay.jpeg"
                                class="rounded-circle img-fluid" />
                        </div>
                        <div class="card-body">
                            <h4 class="mb-4">Tanay Nandi</h4>
                            <hr />
                            <p class="dark-grey-text mt-4">
                            <img src="images/profile/quotes.png" width=40px alt="">I was amazed by the exceptional customer service provided by Sholler. The team was prompt, courteous, and went above and beyond to assist me. I highly recommend their services!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5 mb-md-0 d-flex align-items-stretch">
                    <div class="card testimonial-card">
                        <div class="card-up" style="background-color: #7a81a8;"></div>
                        <div class="avatar mx-auto bg-white">
                            <img src="images/profile/soumendu.jpeg"
                                class="rounded-circle img-fluid" />
                        </div>
                        <div class="card-body">
                            <h4 class="mb-4">Aeijit Das</h4>
                            <hr />
                            <p class="dark-grey-text mt-4">
                               <img src="images/profile/quotes.png" width=40px alt=""> Sholler delivers top-notch products that are of outstanding quality. I was pleasantly surprised by the attention to detail and craftsmanship. It's definitely worth every penny!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-0 d-flex align-items-stretch">
                    <div class="card testimonial-card">
                        <div class="card-up" style="background-color: #6d5b98;"></div>
                        <div class="avatar mx-auto bg-white">
                            <img src="images/profile/anirban.png"
                                class="rounded-circle img-fluid" />
                        </div>
                        <div class="card-body">
                            <h4 class="mb-4">Anirban Majumdar</h4>
                            <hr />
                            <p class="dark-grey-text mt-4">
                            <img src="images/profile/quotes.png" width=40px alt="">Shopping at Sholler was an absolute breeze. The website is user-friendly, and the checkout process was quick and secure. I'm thrilled with my purchase and will definitely be a repeat customer!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- --------------------footer---------------------- -->
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

        
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
            crossorigin="anonymous"></script>

        
        <script src="js/custom.js"></script>
    </body>

    </html>


 