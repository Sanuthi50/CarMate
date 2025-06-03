<?php

// start session

session_start();

//create constants to store non repeating values
define('SITEURL','http://localhost/New/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','carmate');

$conn=mysqli_connect(LOCALHOST,'root','');//database connecion
$db_select=mysqli_select_db($conn,'carmate');





?>