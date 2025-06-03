<?php 
//include conection
include('../config/constants.php');

//check whether the id and image_name value is set or not
if(isset($_GET['ID']) AND isset($_GET['Image_name']))
{
    //get the value and delete
    $ID = $_GET["ID"]; 
    $Image_name = $_GET['image_name'];
    
    //remove the physical image file if available
    if($Image_name!="")
    {
        //image is available. so remove it
        $path="../images/category/".$Image_name;
        //Remove the image
        $remove = unlink($path);
        //if failed to remove image then add an error message and stop the process
        if($remove==false)
        {
            //set the session message
            $_SESSION['remove'] = "<div class = 'error'>Failed to Remove Image.</div>";
            //redirect to manage cusine pg
            header('location:'.SITEURL.'provider/manage-category.php');
            //stop the process
            die();
         }
        }
           //delete data from database
         //sql to delete
         $sql="DELETE FROM category WHERE id = $ID";
         $res= mysqli_query($conn,$sql);

         //check whether the data is deleted

         if($res== true){
                //success
                $_SESSION['delete'] = "Category deleted successfully";
                header('location:'.SITEURL.'provider/manage-category.php');
             }
         else{
                //failed
                $_SESSION['delete'] = "Failed to delete the category";
                //redirect
                header('location:'.SITEURL.'provider/manage-category.php');

         }

    //redirect to manage category page with message

     }
else
{
    //redirect to manage category pg
    header('location:'.SITEURL.'provider/Mange-category.php');
}

?>