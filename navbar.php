<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">

    <!--bootstrap icon link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <title>ReSell Your Shoes</title>
    <link rel="icon" href="images\icons\webisite_logo.png">
</head>
<style>
    .navbar-nav .nav-link:hover {
        color: #FF69B4 !important;
        font-size: 1.02rem;
    }
    .navbar {
        position: sticky;
        top: 0;
        width: 100%;
        background-color: #213555;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        z-index: 10000;
    }


</style>
<body>
    
<nav class="navbar navbar-expand-lg bg-body-tertiary text-light" style="background-color: #213555; height:5rem;">

    <div class="container-fluid ms-4">
        <a class="navbar-brand" style="color:#EB5B00; font-family: 'Arial'; font-weight: 600; font-size: 1.2rem; ";>Step Up Your Style</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav row justify-content-around ms-5">
            <li class="nav-item col-auto">
                <a class="nav-link text-white" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item col-auto">
                <a class="nav-link text-white" href="#about">About</a>
            </li>
            <li class="nav-item col-auto">
                <a class="nav-link text-white" href="aboutus.php">Why</a>
            </li>
            <li class="nav-item col-auto">
                <a class="nav-link text-white" href="#contact">Contact</a>
            </li>
            <li class="nav-item col-auto">
                <a class="nav-link text-white" href="home.php">Product</a>
            </li>
        </ul>

        <form class="d-flex mt-1 ms-auto">
            <div class="input-group">
                <span class="input-group-text" id="search-icon"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control" placeholder="Search anything..." aria-label="Search" aria-describedby="search-icon">
            </div>
        </form>



        <ul class="list-inline ms-3 mt-3 fs-5">
            <li class="list-inline-item"><a href="#wishlist"  class ="text-white" data-bs-toggle="modal" data-bs-target="#mymodal_login"> <i class="bi bi-suit-heart"></i></a></li>
            <li class="list-inline-item" ><a href="#wishlist" class="text-white" data-bs-toggle="modal" data-bs-target="#mymodal_login"><i class="bi bi-cart3"></i></a></li>
            <li class="list-inline-item me-3" ><a href="#wishlist" class="text-white" data-bs-toggle="modal" data-bs-target="#mymodal_login"><i class="bi bi-person"></i></a></li>
        </ul>

        </div>
    </div>
    </nav>

    <!------------------------------------------------------ Login------------------------------------------------------------------ -->
    <?php require 'login.php'?>





</body>
</html>