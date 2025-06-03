<?php include ('partials/Menu.php')?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Categories</h1>

        <br>
        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?> <br><br>
<!--Add Category form starts-->
<form action = "" method = "POST" enctype="multipart/form-data">
    <!--image upload-->
    <table class="tbl-30">
        <tr>
            <td>Title: </td>
            <td>
                <input type="text" name="title" placeholder="Enter Category Name">
            </td>

        
        </tr>
          <tr>
            <td>Select Image: </td>
            <td>
                <input type="file" name="Image">
            </td>

        
        </tr>
             <tr>
            <td>Active:</td>
            <td>
                <input type="radio" name="active" value="Yes">Yes
                <input type="radio" name="active" value="No">No
         </td>
         <tr>
            
            <td>
                <input type="submit" name="submit" value="Add Category"class ="btn-secondary">
                
         </td>

        </tr>
    </table>
</form>

<!--Add Category form Ends-->

<?php
//check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
    //get the value from form
    $title=$_POST['title'];
    //for radio input: check whether the button is selected or not
      if(isset($_POST['active']))
    {
        $active= $_POST['active'];

    }
    else{
        $active = "No";
    }
    //check whether the image is selected or not and seeting the value
          if(isset($_FILES['Image']['name']))
          {
            //uplod the image
            //to upload image we need image name source path and destination path
            $Image_name = $_FILES['Image']['name'];
            //upload image only if image is selected
            if($Image_name !="")
            {

            //auto rename image
            //get the extentionn of image 
            $image_info = explode(".",$Image_name);
                    $ext = end($image_info);


            //rename the image 
            $Image_name="Service_category_".rand(00000,99999).".".$ext; //new name: service_category_10.

            $source_path = $_FILES['Image']['tmp_name'];
            $destination_path = "../images/category/".$Image_name;

            //finally upload the image
            $upload = move_uploaded_file($source_path,$destination_path);

            //check whether the image is uploaded or not 
            //and if the image is not uploaded then the processes will stop and redirect 
            if($upload==false)
            {
                $_SESSION['upload']="<div class='error'>Failed to Upload Image</div>";
                //redirect
                header('location:'.SITEURL.'provider/Add-category.php');
                //stop the process
                die();
            }
         }
         }
          else
          {
            //don't upload image and set the image name value as blank
            $Image_name="";
          }

    //create sql query to insert cusines into database
    $sql = "INSERT INTO category SET
    name='$title',
    Image_name='$Image_name',
    active = '$active'";

    //Excexute the query and save in database
    $res=mysqli_query($conn,$sql);
    //check whether the query excecuted or not and data added or not
    if($res==true)
    {
        //query excecuted and category added
        $_SESSION['add'] = "Category added successfully.";
        //redirect to manage cusines page
        header('location:'.SITEURL.'Provider/manage-category.php');
    }
    else
    {
        //failed to add category
        $_SESSION['add'] = "Category added successfully.";
        //redirect to add cusines page
        header('location:'.SITEURL.'Provider/manage-category.php');

    }
    
}
?>
    </div>
</div>


<?php include ('partials/Footer.php')?>