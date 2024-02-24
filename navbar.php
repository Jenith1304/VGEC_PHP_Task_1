<?php
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">ToDo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
</nav>