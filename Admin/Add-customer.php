<?php
// Start the session at the beginning
include('partials/Menu.php');

if (isset($_SESSION['add'])) {
    $sessionMessage = $_SESSION['add']; // Store the session message
    unset($_SESSION['add']); // Remove it after storing
}

if (isset($_POST['submit'])) {
    // Get the data from form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Password encryption with MD5
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    // SQL query to save the data into the database
    $sql = "INSERT INTO customer SET
    name = '$name',
    email = '$email',
    username = '$username',
    password = '$password',
    address = '$address',
    contact = '$contact'";

    // Execute query and save data in database
    $res = mysqli_query($conn, $sql);

    // Check whether the data is inserted or not and display appropriate message
    if ($res == TRUE) {
        $_SESSION['add'] = "Customer Added Successfully"; // Create a session variable to display message
        header("location:" . SITEURL . 'Admin/Customer.php'); // Redirect to Manage page
        exit(); // Always exit after a header redirect
    } else {
        $_SESSION['add'] = "Failed to add the Customer"; // Create a session variable to display message
        header("location:" . SITEURL . 'Admin/Add-customer.php'); // Redirect to add customer page
        exit(); // Always exit after a header redirect
    }
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1 style="text-align: center; color: #333; margin-bottom: 20px;">Add Customer</h1>
        <br><br>

        <?php if (isset($sessionMessage)): ?>
            <div style="text-align: center; color: green;"><?= $sessionMessage; ?></div> <!-- Displaying session message -->
        <?php endif; ?>

        <form action="" method="POST" class="text-center" style="display: flex; flex-direction: column; align-items: center; padding: 20px; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 400px; margin: auto;">
            <div class="field input" style="margin-bottom: 20px; display: flex; align-items: center; width: 100%;">
                <label for="email" style="margin-right: 10px; flex: 1; text-align: right;">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter Email" required style="flex: 2; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div class="field input" style="margin-bottom: 20px; display: flex; align-items: center; width: 100%;">
                <label for="name" style="margin-right: 10px; flex: 1; text-align: right;">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter Name" required style="flex: 2; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div class="field input" style="margin-bottom: 20px; display: flex; align-items: center; width: 100%;">
                <label for="username" style="margin-right: 10px; flex: 1; text-align: right;">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter Username" required style="flex: 2; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div class="field input" style="margin-bottom: 20px; display: flex; align-items: center; width: 100%;">
                <label for="password" style="margin-right: 10px; flex: 1; text-align: right;">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter Password" autocomplete="off" required style="flex: 2; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div class="field input" style="margin-bottom: 20px; display: flex; align-items: center; width: 100%;">
                <label for="address" style="margin-right: 10px; flex: 1; text-align: right;">Address</label>
                <input type="text" name="address" id="address" placeholder="Enter Address" autocomplete="off" required style="flex: 2; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div class="field input" style="margin-bottom: 20px; display: flex; align-items: center; width: 100%;">
                <label for="contact" style="margin-right: 10px; flex: 1; text-align: right;">Contact</label>
                <input type="text" name="contact" id="contact" placeholder="Enter Contact" autocomplete="off" required style="flex: 2; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div class="field" style="margin-top: 20px;">
                <input type="submit" class="btn-primary" name="submit" value="Add Customer" required style="padding: 10px 20px; cursor: pointer; background-color: #5cb85c; color: white; border: none; border-radius: 4px; transition: background-color 0.3s;">
            </div>
        </form>
    </div>
</div>

<?php include('partials/Footer.php');?>
