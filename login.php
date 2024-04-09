<?php

include 'connection.php';
session_start();
$email = $_POST['email'];
$password = $_POST['password'];


$sql = "select * from users where email='$email' ";
$result = mysqli_query($con, $sql);
if ($result) {
   $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
   $count = mysqli_num_rows($result);


   if($count == 0) {
      echo "Error: user not found";
      exit();
   }
   
   $pepper ="c1isvFdxMDdmjOlvxpecFw";
   $pwd_peppered = hash_hmac("sha256", $password, $pepper);
   $pwd_hashed = $row["password"];
   if (!password_verify($pwd_peppered, $pwd_hashed))
   {
      echo "Password incorrect.";
      exit();
   }



   $active = $row['isActive'];
   $roleId = $row['RoleId'];
   $id = $row['id'];

  
   if ($count == 1 && $active == 1) {
      $_SESSION['email'] = $email;
      $_SESSION['roleId'] = $roleId;
      $_SESSION['id'] = $id;
      header("location: index.php");
   } else {
      $error = "Your Login Name or Password is invalid";
   }
} else {
   echo "Error: " . $sql . "<br>" . mysqli_error($con);
   exit();
}



?>