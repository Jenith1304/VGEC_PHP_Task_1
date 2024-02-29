<?php
session_start();
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body> -->
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">ToDo</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="ToDo.php">Your ToDo<span class="sr-only">(current)</span></a>
      </li>
      
      <?php if(isset($_SESSION["login"]))
      { echo '<li class="nav-item nav-link">Welcome '.$_SESSION["fname"].'</li><li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>'; } 
      else 
      { echo '<li class="nav-item"><a class="nav-link" href="Registration.php">Registration</a></li>
        <li class="nav-item"><a class="nav-link" href="Login.php">Login</a></li>';}
      ?>
    </li>
    </ul>
  </div>
</nav>  -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ToDo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="ToDo.php">Your ToDo</a>
        </li>
        <?php if(isset($_SESSION["login"]))
      { echo '<li class="nav-item nav-link">Welcome '.$_SESSION["fname"].'</li><li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>'; } 
      else 
      { echo '<li class="nav-item"><a class="nav-link" href="Registration.php">Registration</a></li>
        <li class="nav-item"><a class="nav-link" href="Login.php">Login</a></li>';}
      ?>
      </ul>
    </div>
  </div>
</nav>
<!-- </body>
</html> -->
