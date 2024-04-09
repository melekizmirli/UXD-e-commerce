<?php
 include 'connection.php';
 $email=$_POST['email'];
 $name=$_POST['name'];
 $surname=$_POST['surname'];
 $password=$_POST['password'];
 $repassword=$_POST['repassword'];
if($password!=$repassword){
    $failure = "password does not match ";
    exit($failure);
    //header("Location: signup.html");
}else{
    $pepper ="c1isvFdxMDdmjOlvxpecFw";
    $pwd = $_POST['password'];
    $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
    $pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2ID);

    $sql="insert into users (create_time,email,name,surname,password,isActive,RoleId) values (now(),'$email','$name','$surname','$pwd_hashed',1,2) ";
    $result = mysqli_query($con,$sql);
    header("Location: login.html");
}
?>

