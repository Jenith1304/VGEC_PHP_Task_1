<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$con=mysqli_connect("localhost","root","","vgec_php_task_1");
if (isset($_REQUEST["btn_register"]))
{
$msg=$_REQUEST["msg"];
$fname=$_REQUEST["txt_fname"];
$lname=$_REQUEST["txt_lname"];
$gender=$_REQUEST["chk_gender"];
$regemail=$_REQUEST["txt_email"];
$regpno=$_REQUEST["txt_pno"];
$city=$_REQUEST["txt_city"];
$state=$_REQUEST["txt_state"];
$zip=$_REQUEST["txt_zip"];
$regpassword=$_REQUEST["txt_password"];
$regcfpassword=$_REQUEST["txt_cfpassword"];
$sql = mysqli_query($con, "SELECT * FROM `registration` WHERE `Email Address`='$regemail'");
$result = mysqli_num_rows($sql);
$fetch = mysqli_fetch_assoc($sql);

if(mysqli_num_rows($sql) > 0){
     ?>
     <script>
           alert("<?php  echo "Sorry Mail Already Exists,Please Try with Different Mail Address "?>");
     </script>
           <?php  
}else{
if($regpassword == $regcfpassword)
{
     $query="INSERT INTO `registration`(`Fname`, `Lname`, `Email Address`, `Phone Number`, `Gender`, `City`, `State`, `Zip`, `Password`) VALUES 
     ('$fname','$lname','$regemail','$regpno','$gender','$city','$state','$zip','$regpassword')";
     if (mysqli_query($con, $query)) {
          header('Location: Login.php'); 
        } else {
          echo "Error: " . $query . "<br>" . mysqli_error($con);
        }        
}
else{
     ?>
     <script> alert("Passwords Do Not Match,Please try Again")
     <?php
}
}    
}
?>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootsrap CDNs -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- userdefined scripts -->
    <script src="script.js"></script>
</head>

    <title>Registration</title>
</head>
<body>
<!-- navbar included -->
<?php include 'navbar.php'; ?>
    <!-- Registration Form  -->
        <form method="post">
           <div class="container mt-5 border border-dark rounded" style="max-width:620px">
         <!-- name and email textboxes -->
                <div class="form-group mt-2">
                    <label >First Name</label>
                    <input type="text" class="form-control" name="txt_fname" placeholder="First Name" required >
                 </div>
                 <div class="form-group mt-2">
                    <label >Last Name</label>
                    <input type="text" class="form-control" name="txt_lname" placeholder="Last Name" required >
                 </div>
                <div class="form-group mt-2">
                     <label>Email address</label>
                     <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txt_email" placeholder="Enter email" required >
                     <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>     
                </div>
                <!-- phone number textboxes -->
             
                <div class="form-group col-md-6 mt-2">
                     <label for="telNumber">Phone number</label>
                    <input type="text" class="form-control" name ="txt_pno" id="txt_pno" onKeyUp=" ValidateMobileNumber()" maxlength="10" required >
                    <span id="lblError" class="error"></span>
                </div>


                <!-- gender radio button -->
                <label class="mt-2">Gender</label>
                <div class="form-check ">
                    
                    <input class="form-check-input" type="radio" name="chk_gender" value="Male" id="flexCheckDefault" required >
                    <label class="form-check-label" for="flexCheckDefault">
                    Male
                     </label>
                </div>
                <div class="form-check ">
                     <input class="form-check-input" type="radio" name="chk_gender" value="Female" id="flexCheckChecked" required >
                     <label class="form-check-label" for="flexCheckDefault">
                    Female
                     </label>    
                </div>
                <!-- Address Details -->
                <div class="form-group col-md-6 mt-2">
                     <label for="inputCity">City</label>
                     <input type="text" class="form-control" name="txt_city"id="inputCity" required >
                </div>
                <div class="form-group col-md-4 mt-2">
                     <label for="inputState">State</label>
                     <input type="text" class="form-control" name="txt_state" id="inputState" required >
                </div>
                <div class="form-group col-md-4 mt-2">
                     <label for="inputZip">Zip</label>
                     <input type="text" onKeyUp="validateInput()" class="form-control"  name="txt_zip" id="zipCode" required />
                     <div id="msg" name="msg">
                     </div>
               </div>
               <div class="form-group col-md-6 mt-2">
                     <label for="password">Password</label>
                     <input type="password" class="form-control" name="txt_password" required >
               </div>
               <div class="form-group col-md-6 mt-2">
                     <label for="confirmpassword">Confirm Password</label>
                     <input type="password" class="form-control" name="txt_cfpassword" required >
                </div>
                <div class="form-group mt-3 mb-2 ">
                <button type="submit" name="btn_register" class="btn btn-success">Register</button>
                <a href="Login.php" class="btn btn-link">Login</a>
                </div>

               </div>
               </form>
</body>
</html>
