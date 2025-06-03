<?php
include('partials/Menu.php');?>

<div class="Main-content">
    <div class="wrapper">
        <h1> Update Customer </h1><br><br>
        <?php
        //get the ID of selected customer

        $ID=$_GET['ID'];

        //create sql query to get the details
        $sql="SELECT*FROM customer WHERE id=$ID";

        //Excecute the query
        $res=mysqli_query($conn,$sql);
        
        //check whether the query is excecuted or not
        if($res==true)
        {
            //check whether the data is available or not
            $count = mysqli_num_rows($res);
            //check whether we have customer data or not
            if ($count==1)
            {
                //get the details
              $row = mysqli_fetch_assoc($res);

              $email=$row['email'];
              $username = $row['username'];

            } else{
                //redirect to customer account managing page
                header('location:'.SITEURL.'admin/customer.php');
            }
        }
        ?>

        <form action="" method="POST" class="text-center"> 
            
                <div class="field input" >
                <label for="email">Full name</label>
                <input type="text" name="email" id="email" value="<?php echo $email;?>"required>
                </div>
                <br>
                <br>
                <div class="field input" >
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?php echo $username;?>"required>
                </div>
                <br>
                <br>
              
                        <input type="hidden" name=" ID" value="<?php echo $ID;?>">
                        <input type="submit" name = "submit" value="Update Manager" class = "btn-primary">

        </form>
    </div>
</div>
<?php
//check whether the submit button is clicked or not 
if(isset($_POST['submit']))
{
    //get all the values from form to update
    $ID = $_POST['ID'];
    $email =  $_POST['email'];
    $username =  $_POST['username'];
    //create a sql query to update customer
    $sql = "UPDATE users SET
     email = '$email',
    username = '$username'
    WHERE id = '$ID'";

    //excecute the query
    $res = mysqli_query($conn,$sql);

    if ($res==true)
    {
        //query Excecute and customer updated
        $_SESSION['update'] = "Customer's Account Updated Successfully";
        //redirect to manage customer pg
        header('location:'.SITEURL.'admin/customer.php');
    }
    else{
        //failed to update customer
        $_SESSION['update'] = "Failed to update the customer";
        //redirect to manage customer pg
        header('location:'.SITEURL.'admin/Customer.php');
    }
}

?>



<?php
include('partials/Footer.php');
?>