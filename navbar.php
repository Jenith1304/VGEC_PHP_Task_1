<?php
session_start();
?>
      
      <?php if(isset($_SESSION["login"]))
      { echo '<li class="nav-item nav-link">Welcome '.$_SESSION["fname"].'</li><li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>'; } 
      else 
      { echo '<li class="nav-item"><a class="nav-link" href="Registration.php">Registration</a></li>
        <li class="nav-item"><a class="nav-link" href="Login.php">Login</a></li>';}
      ?>
 
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

