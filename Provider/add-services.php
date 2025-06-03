<?php include ('partials/Menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1> Add Services </h1>
        <br>
        <?php
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>
                        Title: 
                    </td>
                    <td>
                        <input type="text" name="Title" placeholder="Title of the service" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Description:
                    </td>
                    <td>
                        <textarea name="Description" cols="30" rows="10" placeholder="Description of the Service" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        Price:
                    </td>
                    <td>
                        <input type="number" name="Price" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Select Image:
                    </td>
                    <td>
                        <input type="file" name="Image" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Category type:
                    </td>
                    <td>
                        <select name="Category" required>
                            <?php 
                            // Fetch categories from the database
                            $sql = "SELECT * FROM category WHERE active = 'Yes'";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);

                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $id = $row['id'];
                                    $title = $row['name'];
                                    echo "<option value='$id'>$title</option>";
                                }
                            } else {
                                echo "<option value='0'>No Category is found</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="Active" value="Yes" required>Yes
                        <input type="radio" name="Active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Service" class="btn-Service">
                    </td>
                </tr>
            </table>
        </form>

        <?php 
        // Check if the button is clicked
        if (isset($_POST['submit'])) {
            // Add the service 
            $Title = $_POST['Title'];
            $Description = $_POST['Description'];
            $Price = $_POST['Price'];
            $Category = $_POST['Category'];

            // Check whether the radio button for active is checked or not
            $Active = isset($_POST['Active']) ? $_POST['Active'] : "No";

            // Upload the image if selected
            if (isset($_FILES['Image']['name']) && $_FILES['Image']['name'] != '') {
                $Image_name = $_FILES['Image']['name'];
                // Rename and upload the image
                $image_info = explode(".", $Image_name);
                $ext = end($image_info);
                $Image_name = "Service-name" . rand(00000, 99999) . "." . $ext;

                // Get the source path and destination path
                $src = $_FILES['Image']['tmp_name'];
                $dst = "../images/service/" . $Image_name;

                // Upload the food image
                $upload = move_uploaded_file($src, $dst);

                if ($upload == false) {
                    $_SESSION['upload1'] = "<div class='error'>Failed to upload image</div>";
                    header('location:' . SITEURL . 'Provider/add-Services.php');
                    die();
                }
            } else {
                $Image_name = ""; // If no image selected
            }

            //  Insert into database
            // Use the logged-in user's ID for provider_id
            $provider_id = $_SESSION['user_id']; // Get the logged-in user's ID from session

            $sql1 = "INSERT INTO services SET
                name = '$Title',
                description = '$Description',
                image_name = '$Image_name',
                provider_id = '$provider_id', 
                active = '$Active',
                category_id = '$Category',  
                price = '$Price'";

            $res1 = mysqli_query($conn, $sql1);

            // Redirecting
            if ($res1 == true) {
                $_SESSION['add'] = "Service Added Successfully.";
                header('location:' . SITEURL . 'Provider/Manage-Services.php');
            } else {
                $_SESSION['add'] = "<div class='error'> Failed To Add The Service </div>";
                header('location:' . SITEURL . 'Provider/Manage-Services.php');
            }
        }
        ?>
    </div>
</div>
<?php include('partials/Footer.php') ?>
