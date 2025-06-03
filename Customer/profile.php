<?php include('Partials/Menu.php');?>

<?php
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}

// Fetch customer details from database
$customer_id = $_SESSION['user_id'];
$query = "SELECT * FROM customer WHERE id = '$customer_id'";
$result = mysqli_query($conn, $query);
$customer = mysqli_fetch_assoc($result);

// Handle profile update
if (isset($_POST['update_profile'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    
    // Update customer details in database
    $query = "UPDATE customer SET name = '$name', email = '$email', contact = '$contact_number', address = '$address' WHERE id = '$customer_id'";
    mysqli_query($conn, $query);
    header('Location: Profile.php'); // Refresh page to reflect the changes
}

// Handle profile deletion
if (isset($_POST['delete_profile'])) {
    $query = "DELETE FROM customer WHERE id = '$customer_id'";
    mysqli_query($conn, $query);
    
    session_destroy(); // End the session
    header('Location: register.php'); // Redirect to registration page
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">

    <div style="max-width: 800px; margin: 40px auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; color: #da042a;">Customer Profile</h2>
        <!-- Profile Details Form -->
        <form action="Profile.php" method="post" style="margin-bottom: 20px;">
            <div style="margin-bottom: 15px;">
                <label for="name" style="font-weight: bold;">Name:</label><br>
                <input type="text" name="name" value="<?php echo $customer['name']; ?>" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="email" style="font-weight: bold;">Email:</label><br>
                <input type="email" name="email" value="<?php echo $customer['email']; ?>" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="contact_number" style="font-weight: bold;">Contact Number:</label><br>
                <input type="text" name="contact_number" value="<?php echo $customer['contact']; ?>" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="address" style="font-weight: bold;">Address:</label><br>
                <textarea name="address" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"><?php echo $customer['address']; ?></textarea>
            </div>

            <button type="submit" name="update_profile" style="background-color: #007bff; color: #fff; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;">
                Update Profile
            </button>
        </form>

        <!-- Delete Profile Button -->
        <form action="Profile.php" method="post">
            <button type="submit" name="delete_profile" onclick="return confirm('Are you sure you want to delete your profile?');" style="background-color: #dc3545; color: #fff; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;">
                Delete Profile
            </button>
        </form>

        <?php if (isset($error_message)): ?>
            <div style="color: #dc3545; margin-top: 20px;">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>