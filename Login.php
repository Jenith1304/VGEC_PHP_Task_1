<?php
session_start();
$con=mysqli_connect("localhost","root","","vgec_php_task_1");
if(isset($_REQUEST["btn_login"]))
{
    $logemail=$_REQUEST["txt_loginemail"];
    $logpassword=$_REQUEST["txt_loginpassword"];
    $query="SELECT * from registration where `Email Address`='$logemail' AND `Password`='$logpassword'";
    $result=mysqli_query($con,$query);
    // $val=mysqli_num_rows($result);
    // echo $val;
    if( mysqli_num_rows($result) === 1 )
    {
        $row=mysqli_fetch_assoc($result);
        if($row['Email Address']==$logemail && $row['Password']==$logpassword)
        {
            $_SESSION["email"]=$row['Email Address'];
            $_SESSION["fname"]=$row["Fname"];
            $_SESSION["login"]=true;
      ?>
     <script type="text/javascript"> alert("Login Successfull"); 
     window.location.href = "ToDo.php" </script>
           <?php
        }    
    }
    else 
    { ?> 
     <script> alert("Incorrect Username Or Password") </script>
     <?php
     }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- google recaptcha script -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- userdefined styles -->
    <link rel="stylesheet" href="style.css">
    <!-- userdefined scripts -->
    <script src="script.js"></script>   
</head>
<body>  
        <nav class="navbar bg-body-tertiary">
             <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">To Do List Login</span>
            </div>
         </nav>
    <!-- Login Form  -->
        <form method="post">
           <div class="container mt-5 border border-dark rounded" style="max-width:620px">
                <div class="form-group mt-2">
                     <label>Email address</label>
                     <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txt_loginemail" placeholder="Enter email" required >
                     <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>     
                </div>
               <div class="form-group col-md-6 mt-2">
                     <label for="password">Password</label>
                     <input type="password" class="form-control" name="txt_loginpassword" required >
                     <a href="RecoverPassword.php" class="btn btn-link">Forgot Your Password?</a>
               </div>
               <div class="g-recaptcha mt-2" data-sitekey="6Lf4NnwpAAAAACXhqvxWqh1VL6zjWDpGaJOCKSBd"></div>
                <div class="form-group mt-3 mb-2 ">
               
                <button type="submit" id="login" name="btn_login" class="btn btn-success">Login</button>
                </div>

               </div>
               </form>
</body>
</html>
<!-- script for captcha validation -->
<script>
$(document).on('click','#login',function(){
    var response=grecaptcha.getResponse();
    if(response.length==0)
    {
        alert("Please Verify You Are Not A Robot");
        return false;
    }
});
</script>