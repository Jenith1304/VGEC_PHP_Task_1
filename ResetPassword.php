<?php session_start() ;

?>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Login Form</title>
</head>
<body>
<nav class="navbar bg-body-tertiary">
     <div class="container-fluid">
           <span class="navbar-brand mb-0 h1">To Do List Reset Password</span>
     </div>
 </nav>

<!-- <main class="login-form"> -->
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Your Password</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="login">

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="rstpassword" required autofocus>
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Reset" name="reset">
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
    if(isset($_POST["reset"])){
        $con=mysqli_connect("localhost","root","","vgec_php_task_1");
        $psw = $_POST["rstpassword"];

        $token = $_SESSION['token'];
        $Email = $_SESSION['rstpswemail'];
        $sql = mysqli_query($con, "SELECT * FROM `registration` WHERE `Email Address`='$Email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if($Email){
            $new_pass = $psw;
            mysqli_query($con, "UPDATE registration SET `Password`='$new_pass' WHERE `Email Address`='$Email'");
            ?>
            <script>
                // window.location.replace("index.php");
                alert("<?php echo "your password has been succesful reset"?>");
                window.location.href = "Login.php";
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("<?php echo "Please try again"?>");
            </script>
            <?php
        }
    }

?>
