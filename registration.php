<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
</head>
<body>
  
    <!-- -------------------------------Body-------------------------------->

    <div class="container-login">
            <div class="modal fade" tabindex="-1" id="mymodal_reg" style="transition: opacity 0.6s ;">
                <div class="modal-dialog modal-dialog-centered" style="padding-top: 4rem;">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sign Up</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="auth/regis_auth.php" method="POST">
                        
                        <div class="mb-3">
                            <label for="user-email" class="form-label">Email address</label>
                            <input type="email"  name="user-email" class="form-control" id="user-email" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="user-name"  class="form-label">Username</label>
                            <input type="text" name="user-name" class="form-control" id="user-name">
                        </div>
                        <div class="mb-3">
                            <label for="user-pass"  class="form-label">Password</label>
                            <input type="password" name="user-pass" class="form-control" id="user-pass">
                        </div>
                        <div class="mb-3">
                            <label for="user-pass-confirm"class="form-label">Confirm Password</label>
                            <input type="password"  name="user-pass-confirm" class="form-control" id="user-pass-confirm">
                        </div>

                        <div class="mb-3">
                            <label for="sequrity-ques"  class="form-label">Security question [Year-of-birth]</label>
                            <input type="password" name="sequrity-ques" class="form-control" id="sequrity-ques">
                        </div>
                        <input type="submit" value= "Signup" class="btn btn-dark">
                    </form>
                    </div>
                    <!-- --- -->
                    <div class="modal-footer d-flex justify-content-between">
                        <div id="registration">Already have an account? <a href="#" data-bs-dismiss="modal"style="text-decoration: none; color:rgb(121, 137, 137);"> Sign In</a><a href="#" data-bs-toggle="modal" data-bs-target="#mymodal_login" ></a></div>
                    </div>
                    </div>
                </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const params = new URLSearchParams(window.location.search);
        if (params.get('showRegModal') === 'true') {
            var myModal = new bootstrap.Modal(document.getElementById('mymodal_reg'));
            myModal.show();

            const newUrl = window.location.pathname;
            window.history.replaceState(null, "", newUrl);
        }
    });
    </script>

    <!-- -------------------------------Body-------------------------------->


</body>
</html>