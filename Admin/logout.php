<?php
include('../Config/constants.php');
//destroy the  session 
session_destroy();//unset$_SESSION['user']
//redirect to login page
header('location:'.SITEURL.'Home/index.php');
?>