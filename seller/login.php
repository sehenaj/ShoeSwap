<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="images/logo-round.png" type="image/x">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
  
    <!-- -------------------------------Body-------------------------------->
    <section id="login">
        <h1>SELLER LOGIN</h1>
        <div class="login-body">
            <img src="images/login.png" class="login-icon"alt="">
            <div class="content">
                <form action="" method="POST">
                    
                    <input type="text"  name="user-name" placeholder="Username" autocomplete="off" required>
                    <input type="password" name="user-pass" placeholder="Password" autocomplete="off" required>
                    <p><a href="registration.php">Register</a> <a href="forgotpass.php">Forgot Password?</a></p>
                    <p><a href="../login_home.html">Login as</a></p>
                    <input type="submit" value="SignIn">
                    
                    
                </form>
                
            <?php
            include('auth/login_auth.php');

            ?>
                
    
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
</body>
</html>