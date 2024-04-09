<?php
 include 'connection.php';
 session_start();
 $id = 0;
  if( isset( $_GET['id']) )
  {
      $id= $_GET['id'];
  }

  $sql = "delete from Basket where id=$id";
  $result = mysqli_query($con, $sql);
  header("Location: basket.php");
?>