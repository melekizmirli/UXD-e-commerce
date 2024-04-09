<?php
 include 'connection.php';
 session_start();
 $id = 0;
  if( isset( $_GET['id']) )
  {
      $id= $_GET['id'];
  }

  $sql = "SELECT p.*,c.name as cname FROM products p inner JOIN categories c on c.id=p.categoryId  where p.id=$id";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

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
      
      <!-- Left links -->
<?php
if(isset($_SESSION['email']) && $_SESSION['email']!="")
{?>
  <div class="d-flex align-items-center">
    <?php if($_SESSION["roleId"]==3){ ?>
      <a href="/productEntry.html">
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
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
      <div class="container mt-3">
        <div class="row">
        <div class="container">
            <h2><?php echo ($row['name']??"") ?></h2>
            <div class="row">
                <div class="col-md-6">
               <?php echo '<img  src="data:image;base64,'.base64_encode($row['photo']).'"/>' ?>
                </div>
                <div class="col-md-6">
                    <p><?php echo ($row['cname']??"") ?></p>
                    <p><?php echo ($row['description']??"") ?></p>
                    <form action="/Basket/Add" method="post">
                        <input type="submit" value="Add to Basket" class="btn btn-warning" formaction="/basket_item_add.php?id=<?php echo $id ?>">
                    </form>
                </div>
            </div>
        </div>
      </div>
     <p>&nbsp;</p>
     <p>&nbsp;</p>
     <p>&nbsp;</p>
     <p>&nbsp;</p>
     <p>&nbsp;</p>
     <p>&nbsp;</p>
     <p>&nbsp;</p>
      <div class="container text-dark bg-light p-4">
        <div class="row">
          <div class="col-6 col-md-8 col-lg-7">
            <div class="row">
              <div class="col-sm-6 col-md-4 col-lg-4 col-12">
                <ul class="list-unstyled">
                  <li class="btn-link"> <a>Facebook</a> </li>
                  <li class="btn-link"> <a>X</a> </li>
                  <li class="btn-link"> <a>Instagram</a> </li>
                  <li class="btn-link"> <a>ETSY</a> </li>
                  <li class="btn-link"> <a>Linkedin</a> </li>
                </ul>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-4 col-12">
                <ul class="list-unstyled">
                  <li class="btn-link"> <a>About Us</a> </li>
                  <li class="btn-link"> <a>Contact</a> </li>
                  <li class="btn-link"> <a>Track Shipment</a> </li>
                  <li class="btn-link"> <a>FAQ</a> </li>
                  <li class="btn-link"> <a>Live Assistant</a> </li>
                </ul>
              </div>
               
            </div>
          </div>
          <div class="col-md-4 col-lg-5 col-6">
            <address>
              <strong>University of Greenwich</strong><br>
              Faculty of Science and Engineering<br>
              Computing and Information Systems<br>
              <abbr title="Phone">P:</abbr> (123) 456-7890
            </address>
            <address>
              <strong>Melek Izmirli</strong><br>
              <a href="mailto:#">mi5715n@gre.ac.uk</a>
            </address>
          </div>
        </div>
      </div>
      <footer class="text-center">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <p>Copyright © UOG. All rights reserved.</p>
            </div>
          </div>
        </div>
      </footer>
    </body>


   
    </html>
