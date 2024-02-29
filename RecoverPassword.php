<?php session_start() ?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    <title>Login Form</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
             <span class="navbar-brand mb-0 h1">To Do List Recover Password</span>
        </div>
     </nav>

<!-- <main class="login-form"> -->
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Password Recover</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="recover_psw">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="rstpswemail" required autofocus>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Send OTP" name="recover">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

<!-- </main> -->
</body>
</html>

<?php 
    if(isset($_POST["recover"])){
        $con=mysqli_connect("localhost","root","","vgec_php_task_1");
        $rstpswemail = $_POST["rstpswemail"];
        $otp=rand(100000, 999999);
        $_SESSION["otp"]=$otp;
        $sql = mysqli_query($con, "SELECT * FROM `registration` WHERE `Email Address`='$rstpswemail'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if(mysqli_num_rows($sql) <= 0){
            ?>
            <script>
                alert("<?php  echo "Sorry, no emails exists "?>");
            </script>
            <?php
        }
        else{
            $query="UPDATE `registration` SET `OTP`=$otp WHERE `Email Address`='$rstpswemail'";
            if(mysqli_query($con,$query))
            {
            }
            else
            {
                ?>
                <script>
                        alert("Please Try again Later");
                    </script>
                    <?php
            }
            // generate token by binaryhexa 
            $token = bin2hex(random_bytes(50));
            $_SESSION['token'] = $token;
            $_SESSION['rstpswemail'] = $rstpswemail;
            require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            // h-hotel account
            $mail->Username='minakanupanchal@gmail.com';
            $mail->Password='eeem tbcr hdcj ipmg';

            // send by h-hotel email
            $mail->setFrom('rstpswemail', 'Password Reset');
            // get email from input
            $mail->addAddress($_POST["rstpswemail"]);

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Recover your password";
            $mail->Body="<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly verify using below OTP</p>
            ".$otp."
            <br><br>
            <p>With regrads,</p>";

            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo " Invalid Email "?>");
                    </script>
                <?php
            }else{
                ?>
                    <script>
                       alert("OTP Sent Succesfully To Your Email,Please Verify");
                       window.location.href = "Otp.php";
                    </script>
                <?php
            }
        }
    }


?>