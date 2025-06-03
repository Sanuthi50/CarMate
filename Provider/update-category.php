<?php include('partials/Menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br><br>
        <?php
        if (isset($_GET['ID'])) {
            //get the ID and all the other details
            $ID = $_GET['ID'];
            //sql to get details
            $sql = "SELECT*FROM category WHERE ID=$ID";
            $res = mysqlI_query($conn, $sql);

            // count the rows to validate id
            $count = mysqli_num_rows($res);

            if ($count == 1) {
                //get all the data
                $row = mysqli_fetch_assoc($res);
                $title = $row['name'];
                $current_image = $row['image_name'];
                $active = $row['active'];
            } else {
                $_SESSION['no-category-found'] = "<div class= error> The category is not found </div>";
                header('location:' . SITEURL . 'Provider/manage-category.php');
            }
        } else {
            //redirect to manage category
            header('location:' . SITEURL . 'Provider/Manage-Category.php');
        }
        ?>


        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>


                </tr>
                <tr>
                    <td>Current Image: </td>
                    
                    <td>
                        <?php
                        if ($current_image != "") {
                            //display the image
                        ?>
                            <img src="<?php echo SITEURL;?>images/category/<?php echo $current_image; ?>" width="200px" ; <?php
                        }
                        else {
                                            
                                //display the message
                                echo "<div class='error'>Image is not added</div>";
                        }
                     ?>
                     
                   </td>


                </tr>

                <tr>
                    <td>new Image: </td>
                    <td>
                        <input type="file" name="Image">
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if ($active == "Yes") {
                                    echo "checked";
                                } ?> type="radio" name="active" value="Yes">Yes
                        <input <?php if ($active == "No") {
                                    echo "checked";
                                } ?> type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>

                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="ID" value="<?php echo $ID; ?>">

                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">

                    </td>

                </tr>

            </table>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            //get all the values from form

            $ID = $_POST['ID'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $active = $_POST['active'];

            //updating new image if selected
            if (isset($_FILES['Image']['name'])) {
                //get the image details
                $Image_name = $_FILES['Image']['name'];
                //check whether the image is available or not
                if ($Image_name != "") {
                    //image available
                    //upload the new image
                    //auto rename image
                    // A. get the extentionn of image 
                    $image_info = explode(".", $Image_name);
                    $ext = end($image_info);


                    //rename the image 
                    $Image_name = "Service_category_" . rand(00000, 99999) . "." . $ext; //new name: food_category_24.

                    $source_path = $_FILES['Image']['tmp_name'];
                    $destination_path = "../images/category/" . $Image_name;

                    //finally upload the image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //check whether the image is uploaded or not 
                    //and if the image is not uploaded then the processes will stop and redirect 
                    if ($upload == false) {
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image</div>";
                        //redirect
                        header('location:' . SITEURL . 'provider/manage-category.php');
                        //stop the process
                        die();
                    }
                    //remove the current image if the image is available
                    if ($current_image != "") {
                        $remove_path = "../images/category/" . $current_image;
                        $remove = unlink($remove_path);

                        //check whether the image is removed or not 
                        //if failed to remove process stops
                        if ($remove == false) {
                            $_SESSION["failed-remove"] = "<div class = 'error'>Failed to remove current image</div>";
                            header('location:' . SITEURL . 'provider/manage-category.php');
                            die();
                        }
                    } else {
                        $Image_name = $current_image;
                    }
                } else {
                    $Image_name = $current_image;
                }
                //update db
                $sql1 = "UPDATE category SET
                name ='$title',
                image_name = '$Image_name',
                active = '$active'
                WHERE id = $ID
                ";
                //execute the query
                $res1 = mysqli_query($conn, $sql1);

                //redirecting 
                //check whether executed or not
                if ($res1 == true) {
                    //category updated
                    $_SESSION['update'] = "Category updated Successfully.";
                    header('location:' . SITEURL . 'Provider/manage-category.php');
                } else {
                    $_SESSION['update'] = "<div class= 'error'> Category Failed to Update</div>";
                    header('location:' . SITEURL . 'Provider/manage-category.php');
                }
            }
        }




        ?>
    </div>
</div>
<?php include('partials/Footer.php') ?>