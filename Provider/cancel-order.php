<?php
//include constatnt.php file
include('../config/constants.php');


$ID = $_GET['ID'];

$sql = " UPDATE booking SET status ='Cancelled' WHERE id = $ID"; 



$res = mysqli_query($conn, $sql);



if($res==true)
{
   

    $_SESSION['Cancel']="<div class = 'success '>Booking Status changed Successfully!<div>";

   
    header('location:'.SITEURL.'Provider/manage-orders.php');
}
else{
    
    
    $_SESSION['Cancel']="<div class = 'error '>Failed to change the booking ststus. try again later...!</div>";
    header('location:'.SITEURL.'Provider/manage-orders.php');
}
//redirect to with message (sucess/error)



?>