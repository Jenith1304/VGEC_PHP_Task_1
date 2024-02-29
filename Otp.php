<?php session_start() ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>OTP Veification</title>
</head>
<body>
<nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
             <span class="navbar-brand mb-0 h1">To Do List OTP validation</span>
        </div>
</nav>

<div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">OTP Validation</div>
                    <div class="card-body">
                        <form action="#" method="POST">

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Enter OTP</label>
                                <div class="col-md-6">
                                    <input type="text"  class="form-control" name="votp" required autofocus>
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Submit" name="btn_otpSubmit">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>
</html>
<?php
if(isset($_POST["btn_otpSubmit"]))
{
$verifyOTP=$_POST["votp"];
$sentOtp=$_SESSION["otp"];
if($verifyOTP == $sentOtp)
{
   ?><script> alert("Your OTP Is Verified");
 window.location.href = "ResetPassword.php";</script><?php
}
}
?>