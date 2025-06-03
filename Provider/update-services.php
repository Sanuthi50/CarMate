<?php
// Start output buffering
ob_start();

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include necessary files
include('partials/Menu.php');

if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];

    // Ensure $conn is defined and connected to the database
    $sql2 = "SELECT * FROM Services WHERE id=$ID";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);

    if (!$row2) {
        header('location:' . SITEURL . 'Provider/Manage-services.php');
        exit();
    }

    $Title = $row2['name'];
    $Description = $row2['description'];
    $Price = $row2['price'];
    $current_image = $row2['image_name'];
    $current_category = $row2['category_id'];
    $active = $row2['active'];
} else {
    header('location:' . SITEURL . 'Provider/Manage-services.php');
    exit();
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Service</h1>
        <br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="Title" value="<?php echo htmlspecialchars($Title); ?>">
                    </td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="Description" cols="30" rows="5"><?php echo htmlspecialchars($Description); ?></textarea> 
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="Price" value="<?php echo htmlspecialchars($Price); ?>">
                    </td>
                </tr>
                <tr>
                    <td>Current Image:</td>
                    <td>
                        <?php
                        if ($current_image == "") {
                            echo "<div class='error'> Image Not Available </div>";
                        } else {
                            echo "<img src='" . SITEURL . "images/service/$current_image' width='200px'>";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Select New Image:</td>
                    <td>
                        <input type="file" name="Image">
                    </td>
                </tr>
                <tr>
                    <td>Category type:</td>
                    <td>
                        <select name="Category">
                            <?php
                            $sql = "SELECT * FROM category WHERE active = 'Yes'";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);

                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $category_ID = $row['id'];
                                    $category_Title = $row['name'];
                                    ?>
                                    <option value="<?php echo $category_ID; ?>" <?php if ($current_category == $category_ID) { echo "selected"; } ?>>
                                        <?php echo htmlspecialchars($category_Title); ?>
                                    </option>
                                    <?php
                                }
                            } else {
                                echo "<option value='0'>No Category is Available</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes" <?php if (isset($active) && $active == "Yes") { echo "checked"; } ?>> Yes
                        <input type="radio" name="active" value="No" <?php if (isset($active) && $active == "No") { echo "checked"; } ?>> No          
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="ID" value="<?php echo $ID; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="submit" name="submit" value="Update Service" class="btn-service">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            // 1. Get all the details from the form
            $ID = $_POST['ID'];
            $Title = $_POST['Title'];
            $Description = $_POST['Description'];
            $Price = $_POST['Price'];
            $current_image = $_POST['current_image'];
            $Category = $_POST['Category'];
            $Active = $_POST['active'];

            // 2. Upload the image if selected
            if (isset($_FILES['Image']['name']) && $_FILES['Image']['name'] != "") {
                $Image_name = $_FILES['Image']['name'];
                $image_info = explode(".", $Image_name);
                $ext = end($image_info);

                $Image_name = "Service-name" . rand(0000, 9999) . '.' . $ext;

                $src_path = $_FILES['Image']['tmp_name'];
                $dest_path = "../images/service/" . $Image_name;

                $upload = move_uploaded_file($src_path, $dest_path);

                if ($upload == false) {
                    $_SESSION['upload'] = "<div class='error'>Failed to upload new image</div>";
                    header('location:'. SITEURL .'Provider/Manage-Services.php');
                    exit();
                }

                // 3. Remove the image if new image is uploaded and current image exists
                if ($current_image != "") {
                    $remove_path = "../images/service/" . $current_image;
                    $remove = unlink($remove_path);

                    if ($remove == false) {
                        $_SESSION['remove-failed'] = "<div class='error'> Failed to remove current image </div>";
                        header('location:'. SITEURL .'Provider/Manage-services.php');
                        exit();
                    }
                }
            } else {
                // If no new image is uploaded, retain the current image
                $Image_name = $current_image;
            }

            // 4. Update the database with new image name and all other details
            $sql3 = "UPDATE services SET
                name = '$Title',
                description = '$Description',
                price = '$Price',
                image_name = '$Image_name',
                category_id = '$Category',
                active = '$Active'
                WHERE id = $ID";

            $res3 = mysqli_query($conn, $sql3);

            if ($res3 == true) {
                $_SESSION['update1'] = "<div class='success'> Service Updated Successfully.</div>";
                header('location:'.SITEURL.'Provider/Manage-Services.php');
                exit();
            } else {
                $_SESSION['update1'] = "<div class='error'>Failed to Update the Service</div>";
                header('location:'.SITEURL.'Provider/Manage-Services.php');
                exit();
            }
        }
        ?>
    </div>
</div>

<?php 
// Flush the output buffer and send the output to the browser
ob_end_flush(); 
include('partials/Footer.php'); 
