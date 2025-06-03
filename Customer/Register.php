<?php 
include('../config/constants.php');?>
<html>
    <head>
        <title>
           Car Mate        
        </title>
        <link rel="stylesheet"href="Reg.css">
        <script src="https://kit.fontawesome.com/33e3476347.js" crossorigin="anonymous"></script>
    </head>

    <body>
    <div class="container">
    <div class="box form-box">
           
    <form action="" method="POST">

    <div class="field input">
        <i class="fa-solid fa-user"></i>
        <label for="Full-Name">Full Name</label>
        <input type="text" name="full_name" id="full_name"required>
        
    </div>
    <div class="field input">
    <i class="fa-regular fa-envelope"></i>
        <label for="email">Email</label>
        <input type="email" name="email" id="email"required>
    </div>

    <div class="field input">
        <i class="fa-solid fa-user"></i>
        <label for="username">Username</label>
        <input type="text" name="username" id="username"required>
        
    </div>
     <div class="field input">
        <i class="fa-solid fa-key"></i>
        <label for="password">Password</label>
        <input type="password" name="Password" id="password" autocomplete="off"required>
    </div>
     <div class="field input">
     <i class="fa-solid fa-location-dot"></i>
        <label for="address">Address</label>
        <input type="text" name="address" id="address" autocomplete="off"required>
    </div>
    
     <div class="field input">
     <i class="fa-solid fa-phone"></i>
        <label for="contact">Contact</label>
        <input type="text" name="contact" id="contact" autocomplete="off"required>
    </div>
    <div class="field">
       <input type="submit"class ="btn" name="submit" value="Register" required>
    </div>
    <div class="link">
       Already have an account? <a href ="http://localhost/New/Customer/login.php"> Login Now </a>
    </div>
 </form>
 </div>
</div>
</body>
<?php
//process the value from form and save it in database
//check whether the submit button is clicked or not

if(isset($_POST['submit'])) 
{
    //get the data from form
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $Password = md5($_POST['Password']);//password Encryption with MD5
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    //sql query to save the data into database
    $sql="INSERT INTO customer SET
    name='$full_name',
    email = '$email',
    username='$username',
    password='$Password',
    contact = '$contact',
    address = '$address'

    ";

// Execute query and save data in database

$res = mysqli_query($conn,$sql);

 //check wether the (query is executed) data is inserted or not and display appropriate message
 if($res==TRUE){
    //data inserted
//create a session variable to display message

$_SESSION['add'] = "Registered Successfully";

//Redirect page to Manage
header("location:".SITEURL.'Customer/login.php');


 } else {

 //data insertion failed
 //create a session variable to display message

$_SESSION['add'] = "Failed to Register";

//Redirect page to add admin.
header("location:".SITEURL.'Customer/Register.php');


 }
}


?>
    </body>
    </html>