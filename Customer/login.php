<?php
include('../config/constants.php');
?>
<html>
    <head>
        <title>Service Provider Login</title>
        <link rel="stylesheet" href="Reg.css">
        <script src="https://kit.fontawesome.com/33e3476347.js" crossorigin="anonymous"></script>
    </head>

    <body>
    <div class="container">
    <div class="box form-box">
            <h1> Login</h1>
            <br>
            <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset ($_SESSION['login']);
            }
            if(isset ($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
            
            ?>
            <br>
            <!--Login stats here-->
<form action="" method="POST" class="text-center">
<div class="field input">
        <i class="fa-solid fa-user"></i>
        <label for="username">Username</label>
        <input type="text" name="username" id="username"required>
        
    </div>
     <div class="field input">
        <i class="fa-solid fa-key"></i>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" autocomplete="off"required>
    </div>
    <div class="field">
       <input type="submit"class ="btn" name="submit" value="Login" required>
    </div>
    <div class="link">
      Don't have an account? <a href ="http://localhost/New/Customer/Register.php"> Register Now </a>
    </div>
<!--login ends here-->
</form>           
        </div>
        </div>

    </body>
</html>

<?php
//check whether the submit button is clicked or not
if(isset($_POST['submit'])) 
{
    //process for login
    //get the data from login form
    $username = $_POST['username'];
    $password= md5($_POST['password']);
    //sql to check whether the username and password exsist or not
    $sql = "SELECT id FROM customer WHERE username='$username'AND password='$password'";
    //exxecute the query
    $res = mysqli_query($conn,$sql);   
    
    //count rows to check whether the user exsist or not
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        // User available
        $row = mysqli_fetch_assoc($res); // Fetch the user data
        $user_id = $row['id']; // Get the user ID
        
        $_SESSION["login"] = "<div class='success'>Login successful..!</div>";
        $_SESSION['user'] = $username; // Store username in session
        $_SESSION['user_id'] = $user_id; // Store user ID in session
        
        // Redirect to dashboard
        header('location:' . SITEURL . 'Customer/index.php');
        exit; // Always call exit after redirect
    } else {
        // User not available
        $_SESSION["login"] = "<div class='error'>Login failed..!</div>";
        
        // Redirect to login page
        header('location:' . SITEURL . 'Customer/login.php');
        exit; // Always call exit after redirect
    }
}

?>