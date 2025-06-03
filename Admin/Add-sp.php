<?php include('partials/Menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1 style="text-align:center; color:#333;">Add Service Provider's Account</h1>
        <br><br>

        <?php
        if (isset($_POST['submit'])) {
            // Get the data from form
            $full_name = $_POST['full_name'];
            $username = $_POST['username'];
            $password = md5($_POST['password']); // Password encryption with MD5
            $address = $_POST['address'];
            $contact = $_POST['contact'];

            // SQL query to save the data into database
            $sql = "INSERT INTO provider SET
                    name='$full_name',
                    username='$username',
                    password='$password',
                    address='$address',
                    contact='$contact'";

            // Execute query and save data in the database
            $res = mysqli_query($conn, $sql);

            // Check whether the query executed successfully or not and display appropriate message
          //check wether the (query is executed) data is inserted or not and display appropriate message
 if($res==TRUE){
    //data inserted
//create a session variable to display message

$_SESSION['add'] = "<div class = 'success'>Service Provider Added Successfully</div>";

//Redirect page to Manage
header("location:".SITEURL.'admin/Service-Provider.php');


 } else {

 //data insertion failed
 //create a session variable to display message

$_SESSION['add'] = "<div class = 'error'>Failed to add the Service provider</div>";

//Redirect page to add customer.
header("location:".SITEURL.'admin/Add-sp.php');


 }
        }
        ?>

        <!-- Display message if any -->
        <?php if (isset($message)) { echo "<div style='text-align:center;'>$message</div>"; } ?>

        <form action="" method="POST" class="text-center" style="max-width: 500px; margin: auto; background: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
            <div class="field input" style="margin-bottom: 15px;">
                <label for="full_name" style="display: block; font-weight: bold; margin-bottom: 5px;">Full name</label>
                <input type="text" name="full_name" id="full_name" placeholder="Enter Full Name" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div class="field input" style="margin-bottom: 15px;">
                <label for="username" style="display: block; font-weight: bold; margin-bottom: 5px;">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter Username" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div class="field input" style="margin-bottom: 15px;">
                <label for="password" style="display: block; font-weight: bold; margin-bottom: 5px;">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter Password" autocomplete="off" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div class="field input" style="margin-bottom: 15px;">
                <label for="address" style="display: block; font-weight: bold; margin-bottom: 5px;">Address</label>
                <input type="text" name="address" id="address" placeholder="Enter Address" autocomplete="off" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div class="field input" style="margin-bottom: 15px;">
                <label for="contact" style="display: block; font-weight: bold; margin-bottom: 5px;">Contact</label>
                <input type="text" name="contact" id="contact" placeholder="Enter Contact" autocomplete="off" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div class="field" style="text-align: center;">
                <input type="submit" class="btn-primary" name="submit" value="Add Service provider" required style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">
            </div>
        </form>
    </div>
</div>

<?php include('partials/Footer.php'); ?>
