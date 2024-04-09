<?php
session_start();
 include 'Session.php';
 include 'connection.php';

 $id=$_SESSION["id"];
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
   
      <!-- Left links --> <!-- Collapsible wrapper -->
  </div>
  
  <!-- Container wrapper -->
</nav>

        
      <div class="container text-dark bg-light p-4">
        <div class="row">
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
           
            <?php
               $say=0;
               $total=0;
               $result = $con->query("select b.id,p.name,p.price from Basket b
               INNER JOIN users u on u.id=b.userId 
               INNER JOIN products p on p.id=b.productId
               where u.id=$id");
               while ($row = $result->fetch_assoc()) {
                
                 $say++ ;
                echo "<tr>";
                echo "<th scope='row'>".$say."</th>";
                echo "<td>".$row['name']."</td>";
                echo " <td>".$row['price']."</td>";
                echo "<td>";
                echo "    <a href='basket_item_remove.php?id=".$row['id']."'>Remove(x)</a> " ;              
                echo "</td>";
                echo "</tr>";
                $total+=$row['price'];
               }
              ?>
                <tr>
                <th scope='row'></th>
                <td></td>
                <td>Total : <?php echo $total ?></td>
                <td>
                   <a href="Pay.php" class='btn btn-sm btn-primary' >Pay</a>
                </td>
                </tr>
        </tbody>
        </table>
        </div>
      </div>
     