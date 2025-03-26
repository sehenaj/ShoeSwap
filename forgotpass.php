<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
  
    <!-- -------------------------------Body-------------------------------->
    <div class="container-login">
            <div class="modal fade" tabindex="-1" id="mymodal_forgotPass" style="transition: opacity 0.6s ;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Reset your password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="auth/forgotpass_auth.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="security" class="form-label">Security question [Year-of-birth]</label>
                            <input type="password" name="security" class="form-control" id="security">
                        </div>
                        <div class="mb-3">
                            <label for="newpass" class="form-label">Enter your new password</label>
                            <input type="password" name="newpass" class="form-control" id="newpass">
                        </div>
                       
                        <button type="submit" class="btn btn-dark">Reset password</button>
                    </form>
                    </div>
                    </div>
                </div>
        </div>
    </div>
    
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const params = new URLSearchParams(window.location.search);
        if (params.get('showForgotPassModal') === 'true') {
            var myModal = new bootstrap.Modal(document.getElementById('mymodal_forgotPass'));
            myModal.show();

            // 🔹 Remove "showLoginModal" from URL after opening modal
            const newUrl = window.location.pathname;
            window.history.replaceState(null, "", newUrl);
        }
    });
    </script>

    <!-- -------------------------------Body-------------------------------->
    
</body>
</html>