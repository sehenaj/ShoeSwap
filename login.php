<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
</head>

<body>
    <!-- -------------------------------Body-------------------------------->
    <div class="container-login">
            <div class="modal fade" tabindex="-1" id="mymodal_login" style="transition: opacity 0.6s ;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Please sign in</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="auth/login_auth.php" method="POST">
                        <div class="mb-3">
                            <label for="user" class="form-label">Username</label>
                            <input type="text" name="user-name" class="form-control" id="user-name">
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="form-label">Password</label>
                            <input type="password" name="user-pass" class="form-control" id="user-pass">
                        </div>
                        <!-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->
                        <button type="submit" class="btn btn-dark">Sign In</button>
                    </form>

                    <?php
                        // include('auth/login_auth.php');
                    ?>

                    </div>

                    <div class="modal-footer d-flex justify-content-between">
                        <div id="registration">Don't have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#mymodal_reg" style="text-decoration: none; color:rgb(121, 137, 137);">Sign Up now</a></div>
                        <div id="forgotPass"><a href="#Pass" data-bs-toggle="modal" data-bs-target="#mymodal_forgotPass" style="text-decoration: none; color: rgb(121, 137, 137);">Forgot password?</a></div>
                    </div>
                    </div>
                </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const params = new URLSearchParams(window.location.search);
        if (params.get('showLoginModal') === 'true') {
            var myModal = new bootstrap.Modal(document.getElementById('mymodal_login'));
            myModal.show();

            // 🔹 Remove "showLoginModal" from URL after opening modal
            const newUrl = window.location.pathname;
            window.history.replaceState(null, "", newUrl);
        }
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- -------------------------------Body-------------------------------->
    </body>

    <?php require 'registration.php'?>
    <?php require 'forgotpass.php'?>


</html>