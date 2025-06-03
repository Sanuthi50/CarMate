<?php
//include constatnt.php file
include('../config/constants.php');

//get the ID of the customer to be deleted
$ID = $_GET['ID'];
//create sql query to delete customer
$sql = "DELETE FROM customer WHERE id=$ID";


//execute the query
$res = mysqli_query($conn, $sql);

//check whether the query excecuted succefully or not

if($res==true)
{
    //queryy excecute succefully and customer deleted
  
    //create session variable to display message 

    $_SESSION['delete']="Customer's Account Deleted Successfully!";

    //redirect to Manage customer Page 
    header('location:'.SITEURL.'admin/customer.php');
}
else{
    //failed to delete customer
    
    $_SESSION['delete']="Failed to delete Customer. try again later...!";
    header('location:'.SITEURL.'admin/Customer.php');
}
//redirect to manage customer page with message (sucess/error)



?>