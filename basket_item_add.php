<?php
 include 'connection.php';
 session_start();
 $id = 0;
  if( isset( $_GET['id']) )
  {
      $id= $_GET['id'];
  }

  $sql = "SELECT * FROM products  where id=$id";
  print $sql;
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $userId=$_SESSION['id'];
  $sql="insert into Basket (productId,userId,create_time) values ($id,$userId,now())";
  if (mysqli_query($con, $sql)) {
      
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
      exit();
  }
  header("Location: productdetail.php?id=$id");
?>