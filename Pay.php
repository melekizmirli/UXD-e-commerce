<?php
session_start();
 include 'Session.php';
 include 'connection.php';
 $id=$_SESSION["id"];

  $sql = "delete from Basket where userId=$id";
  $result = mysqli_query($con, $sql);
  header("Location: basket.php");
?>