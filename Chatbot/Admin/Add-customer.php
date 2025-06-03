<?php include('partials/Menu.php');?>

<div class="main-content">
<div class="wrapper">
    
   
           <h1>Add Customer</h1>
        <br><br>

        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add']; //Displaying session message
            unset($_SESSION['add']); //Removing session message
        }
        ?>
        
        <form action="" method="POST" class="text-center">

        <div class="field input" >
        <label for="email">email</label>
        <input type="email" name="email" id="email" placeholder="Enter Email"required>
        </div>
        <br>
        <div class="field input">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Enter Username"required>
        <br><br>
        </div>
        <div class="field input">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter Password"autocomplete="off"required>
        </div>
        <br><br>
        <div class="field">
       <input type="submit"class ="btn-primary" name="submit" value="Add-Customer" required>
     </div>
     <br><br>
  </form>
 </div>
</div>


<?php include('partials/Footer.php');?>


<?php
//process the value from form and save it in database
//check whether the submit button is clicked or not

if(isset($_POST['submit'])) 
{
    //get the data from form
    $email= $_POST['email'];
    $username = $_POST['username'];
    $Password = md5($_POST['Password']);//password Encryption with MD5

    //sql query to save the data into database
    $sql="INSERT INTO customer SET
   email='$email',
    username='$username',
    password='$Password'
    ";

// Execute query and save data in database

$res = mysqli_query($conn,$sql);

 //check wether the (query is executed) data is inserted or not and display appropriate message
 if($res==TRUE){
    //data inserted
//create a session variable to display message

$_SESSION['add'] = "Customer Added Successfully";

//Redirect page to Manage
header("location:".SITEURL.'admin/customer.php');


 } else {

 //data insertion failed
 //create a session variable to display message

$_SESSION['add'] = "Failed to add the Customer";

//Redirect page to add customer.
header("location:".SITEURL.'admin/Add-Customer.php');


 }
}


?>