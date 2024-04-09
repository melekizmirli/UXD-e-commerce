<?php

if(!isset($_SESSION['email']) && $_SESSION['email']==null)
{
    header("Location: login.html");
}

?>