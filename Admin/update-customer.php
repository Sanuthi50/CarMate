<?php include('partials/Menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1 style="text-align:center; color:#333;">Update Customer</h1>
        <br><br>

        <?php
        // Get the ID of the selected customer
        $ID = $_GET['ID'];

        // Create SQL query to get the details
        $sql = "SELECT * FROM customer WHERE id=$ID";

        // Execute the query
        $res = mysqli_query($conn, $sql);
        
        // Check whether the query is executed or not
        if ($res == true) {
            // Check whether the data is available or not
            $count = mysqli_num_rows($res);

            // Check whether we have customer data or not
            if ($count == 1) {
                // Get the details
                $row = mysqli_fetch_assoc($res);
                $name = $row['name'];
                $email = $row['email'];
                $username = $row['username'];
                $address = $row['address'];
                $contact = $row['contact'];
            } else {
                // Redirect to customer account management page
                header('location:' . SITEURL . 'admin/customer.php');
            }
        }
        ?>

        <form action="" method="POST" class="text-center" style="max-width: 500px; margin: auto; background: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
            <div class="field input" style="margin-bottom: 15px;">
                <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Name</label>
                <input type="text" name="name" id="name" value="<?php echo $name;?>" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div class="field input" style="margin-bottom: 15px;">
                <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email</label>
                <input type="text" name="email" id="email" value="<?php echo $email;?>" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div class="field input" style="margin-bottom: 15px;">
                <label for="username" style="display: block; font-weight: bold; margin-bottom: 5px;">Username</label>
                <input type="text" name="username" id="username" value="<?php echo $username;?>" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div class="field input" style="margin-bottom: 15px;">
                <label for="address" style="display: block; font-weight: bold; margin-bottom: 5px;">Address</label>
                <input type="text" name="address" id="address" value="<?php echo $address;?>" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div class="field input" style="margin-bottom: 15px;">
                <label for="contact" style="display: block; font-weight: bold; margin-bottom: 5px;">Contact</label>
                <input type="text" name="contact" id="contact" value="<?php echo $contact;?>" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <input type="hidden" name="ID" value="<?php echo $ID; ?>">
            <div class="field" style="text-align: center;">
                <input type="submit" name="submit" value="Update Customer" class="btn-primary" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">
            </div>
        </form>
    </div>
</div>

<?php
// Check whether the submit button is clicked or not 
if (isset($_POST['submit'])) {
    // Get all the values from form to update
    $ID = $_POST['ID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    
    // Create SQL query to update customer
    $sql = "UPDATE customer SET
    name = '$name',
    email = '$email',
    username = '$username',
    address = '$address',
    contact = '$contact'
    WHERE id = '$ID'";

    // Execute the query
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        // Query executed and customer updated
        $_SESSION['update'] = "Customer's Account Updated Successfully";
        // Redirect to manage customer page
        header('location:'. SITEURL .'Admin/Customer.php');
    } else {
        // Failed to update customer
        $_SESSION['update'] = "Failed to update the customer";
        // Redirect to manage customer page
        header('location:'. SITEURL .'Admin/Customer.php');
    }
}
?>

<?php include('partials/Footer.php'); ?>
