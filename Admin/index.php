<?php include('partials/menu.php')?>


<!--- Main content section starts -->
<div class="Main-content">
<div class="wrapper">
       <h1>
           ADMIN DASHBOARD

    </h1>
<br>
<?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset ($_SESSION['login']);
            }
            
            ?>
            <br>
<div class="col-4 text-center">
<?php
$sql = "SELECT*FROM provider";
$res = mysqli_query($conn,$sql);
$count = mysqli_num_rows($res);
?>
<h1><?php echo $count?><h1><br>
   No.of Service providers
</div>

<div class="col-4 text-center">
<?php
$sql2 = "SELECT*FROM customer";
$res2 = mysqli_query($conn,$sql2);
$count2 = mysqli_num_rows($res2);
?>
    <h1><?php echo $count2;?><h1><br>
   No.of Customers
</div>
<div class="col-4 text-center">
<?php
$sql2 = "SELECT*FROM booking";
$res2 = mysqli_query($conn,$sql2);
$count2 = mysqli_num_rows($res2);
?>
    <h1><?php echo $count2;?><h1><br>
   No.of Bookings
</div>
<div class="clearfix"></div>
</div>
</div>
    <!--- Main contant section ends -->

<?php include ('partials/Footer.php')?>

