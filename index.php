<?php
 include 'connection.php';
 session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    
    
    <title>Greenwich Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

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
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
        
    
    
      
      <div class="container mt-3">
        <div class="row">
          <div class="col-12">
            <div id="carouselExample" class="carousel slide">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="images/banner.png" class="d-block w-100 " alt="...">
                </div>
                <div class="carousel-item">
                  <img src="images/Unknown.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="images/Unknown-2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="images/Unknown-3.jpg" class="d-block w-100" alt="...">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            
             
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-4">
            <div class="row">
              <div class="col-2"></div>
              <div class="col-lg-6 col-10 ml-1" >
                <h4>Free Shipping</h4>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="row text-center">
              <div class="col-2"></div>
              <div class="col-lg-6 col-10 ml-1">
                <h4>Free Returns</h4>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="row">
              <div class="col-2"></div>
              <div class="col-lg-6 col-10 ml-1">
                <h4>Low Prices</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <h2 class="text-center">RECOMMENDED PRODUCTS</h2>
      <hr>
      <div class="container">
        <div class="row text-center">
        <?php
                    $result = $con->query("SELECT * FROM products  order BY create_time desc LIMIT 0,3");
                    while ($row = $result->fetch_assoc()) {
                      $id = $row['id'];
                      echo " <div class='col-md-4 pb-1 pb-md-0'><div class='card'>";
                      echo '<img  src="data:image;base64,'.base64_encode($row['photo']).'" style="height: 300px; width: 100%; display: block;"/>';
                      echo " <div class='card-body'>";
                      echo " <h5 class='card-title'>".$row["name"]."</h5>";
                      echo " <p class='card-text'>".$row["description"]."</p>";
                      echo " <a href='/productdetail.php?id=".$row["id"]."' class='btn btn-primary'>Detail</a>";
                      echo " </div></div></div>";
                    }
          ?>            
          
        </div>
       
      </div>
      <hr class="mt-3">
      
          
       
      </div>
     
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
