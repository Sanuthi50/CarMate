<?php
//include constatnt.php file
include('../config/constants.php');

//get the ID of the sp to be deleted
$ID = $_GET['ID'];
//create sql query to delete sp
$sql = "DELETE FROM service_provider WHERE id=$ID";


//execute the query
$res = mysqli_query($conn, $sql);

//check whether the query excecuted succefully or not

if($res==true)
{
    //queryy excecute succefully and sp deleted
  
    //create session variable to display message 

    $_SESSION['delete']="Service Provider's Account Deleted Successfully!";

    //redirect to Manage Page 
    header('location:'.SITEURL.'admin/Service-provider.php');
}
else{
    //failed to delete sp
    
    $_SESSION['delete']="Failed to delete service provider's account, try again later...!";
    header('location:'.SITEURL.'admin/Service-provider.php');
}
//redirect to manage page with message (sucess/error)



?>