<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootsrap CDNs -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <!-- userdefined styles -->
    <link rel="stylesheet" href="style.css">
    <!-- userdefined scripts -->
    <script src="script.js"></script>
</head>

    <title>Registration</title>
</head>
<body>
        <nav class="navbar bg-body-tertiary">
             <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">To Do List Registration</span>
            </div>
         </nav>
    <!-- Registration Form  -->
        <form>
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
                     <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required >
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
                    
                    <input class="form-check-input" type="radio" name="gender" value="Male" id="flexCheckDefault" required >
                    <label class="form-check-label" for="flexCheckDefault">
                    Male
                     </label>
                </div>
                <div class="form-check ">
                     <input class="form-check-input" type="radio" name="gender" value="Female" id="flexCheckChecked" required >
                     <label class="form-check-label" for="flexCheckDefault">
                    Female
                     </label>    
                </div>
                <!-- Address Details -->
                <div class="form-group col-md-6 mt-2">
                     <label for="inputCity">City</label>
                     <input type="text" class="form-control" nam="txt_city"id="inputCity" required >
                </div>
                <div class="form-group col-md-4 mt-2">
                     <label for="inputState">State</label>
                     <input type="text" class="form-control" nam="txt_state" id="inputState" required >
                </div>
                <div class="form-group col-md-4 mt-2">
                 <label for="inputZip">Zip</label>
                 <input type="text" onKeyUp="validateInput()" class="form-control"  name="txt_zip" id="zipCode" required />
                <div id="msg" >
                </div>
                </div>
                <div class="form-group mt-3 mb-2 ">
                <button type="button" class="btn btn-success">Success</button>
                </div>

  </div>
        </form>
</body>
</html>
