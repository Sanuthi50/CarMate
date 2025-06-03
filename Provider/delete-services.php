<?php include('../config/constants.php');

 if(isset($_GET['ID'])&& isset($_GET['Image_name']))
 {
    $ID = $_GET['ID'];
    $Image_name = $_GET['Image_name'];

    //checking avalability of image
    if($Image_name!="")
    {
        //image is available, so remove it

        $path="../images/Service/".$Image_name; // path of the image

        //Remove the image

        $remove = unlink($path);

        //if failed to remove image then add an error message and stop the process
        if($remove==false)
        {
           //failed to remove
            //set the session message
            $_SESSION['upload'] = "<div class = 'error'>Failed to Remove the Image.</div>";
            //redirect to manage service pg
            header('location:'.SITEURL.'provider/manage-services.php');
            //stop the process
            die();
         }
        }
           //delete data from database
         //sql to delete
         $sql="DELETE FROM services WHERE id = $ID";
         $res= mysqli_query($conn,$sql);

         //check whether the data is deleted

         if($res== true){
                //success
                $_SESSION['delete'] = "<div class ='success'>Service deleted successfully.</div>";
                header('location:'.SITEURL.'provider/manage-Services.php');
             }
         else{
                //failed
                $_SESSION['delete'] = "<div class ='error'>Failed to delete the Service</div>";
                //redirect
                header('location:'.SITEURL.'Provider/manage-Services.php');

         }

  

 }
 else
 {
    //set the session message
    $_SESSION['unauthorized'] = "<div class ='error'>Unauthorized Access.</div>";
    //redirect 
    header('location:'.SITEURL.'Provider/manage-services.php');
    //stop the process
 }
?>
