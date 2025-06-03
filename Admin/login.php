<?php
session_start();

// Define the admin credentials
$admin_username = "admin";
$admin_password = "admin";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username and password are correct
    if ($username == $admin_username && $password == $admin_password) {
        $_SESSION['admin'] = $username;
        header('location:http://localhost/New/Admin/index.php');
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<style>
body {
    font-family: 'Segoe UI',Tahoma, Geneva, Verdana, sans-serif;
    background-color:gray;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
   
}
.login-container {
    background-color: rgb(220, 220, 220);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    max-width: 400px;
    width: 100%;
}
.login-container h2 {
    text-align: center;
    margin-bottom: 25px;
    font-size: 24px;
    color: #333;
}
.login-container input[type="text"], 
.login-container input[type="password"] {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}
.login-container input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: red;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.login-container input[type="submit"]:hover {
    background-color:red ;
}
.login-container .error {
    color: red;
    text-align: center;
    margin-top: 10px;
    font-size: 14px;
}
.login-container input[type="text"]:focus, 
.login-container input[type="password"]:focus {
    border-color: red;
    outline: none;
    box-shadow: 0 0 5px rgba(188, 42, 66, 0.5);
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
