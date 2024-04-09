<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Greenwich Shop</title>


  </head>
  <body>
    <script src="https://kit.fontawesome.com/3b1ca000cb.js"></script> 

    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="index.php">
     
      GREENWICH GALLERY
    </a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/productList.php?catid=1">AI products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/productList.php?catid=2">Color</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/productList.php?catid=3">Style</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/productList.php?catid=4">Orientation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/productList.php?catid=5">Subject</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/productList.php?catid=6">Size</a>
        </li>
      </ul>
      <?php
if(isset($_SESSION['email']) && $_SESSION['email']!="")
{?>
  <div class="d-flex align-items-center">
    <?php if($_SESSION["roleId"]==3){ ?>
      <a href="/productEntry.php">
        Products
      </a>
      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    <?php } ?>
    <a href="logout.php">
      <?php echo$_SESSION['email'] ?>(X)
    </a>
    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    <a href="Basket.php">
      <i class="fa fa-shopping-cart fa-1" aria-hidden="true"></i>
    </a>
  </div>
  
<?php
}else{
?>
      <div class="d-flex align-items-center">
        <a  class="btn btn-primary me-3" href="/login.html">
          Login
        </a>
        <a class="btn btn-primary me-3" href="/signup.html">
          Sign up for free
        </a>        
      </div>
<?php
}
?> 
      </div>
      <!-- Left links --> <!-- Collapsible wrapper -->
  </div>
  
  <!-- Container wrapper -->
</nav>
