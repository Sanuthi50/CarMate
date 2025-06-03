<?php
include('partials/Menu.php');?>

<div class="Main-content">
    <div class="wrapper">
        <h1>Update Service Provider's Account</h1><br><br>
        <?php
        //get the ID of selected sp
        $ID=$_GET['ID'];

        //create sql query to get the details
        $sql="SELECT*FROM service_provider WHERE id=$ID";

        //Excecute the query
        $res=mysqli_query($conn,$sql);
        
        //check whether the query is excecuted or not
        if($res==true)
        {
            //check whether the data is available or not
            $count = mysqli_num_rows($res);
            //check whether we have provider's data or not
            if ($count==1)
            {
                //get the details
              $row = mysqli_fetch_assoc($res);

              $full_name=$row['name'];
              $username = $row['username'];

            } else{
                //redirect to manage page
                header('location:'.SITEURL.'admin/Service-provider.php');
            }
        }
        ?>

        <form action="" method="POST" class="text-center"> 
            
                <div class="field input" >
                <label for="full_name">Full name</label>
                <input type="text" name="full_name" id="full_name" value="<?php echo $full_name;?>"required>
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
                        <input type="submit" name = "submit" value="Update Service Provider Account" class = "btn-primary">

        </form>
    </div>
</div>
<?php
//check whether the submit button is clicked or not 
if(isset($_POST['submit']))
{
    //get all the values from form to update
    $ID = $_POST['ID'];
    $full_name =  $_POST['full_name'];
    $username =  $_POST['username'];
    //create a sql query to update sp
    $sql = "UPDATE service_provider SET
    name = '$full_name',
    username = '$username'
    WHERE id = '$ID'";

    //excecute the query
    $res = mysqli_query($conn,$sql);

    if ($res==true)
    {
        //query Excecute and provider updated
        $_SESSION['update'] = " Service Provider's Account Updated Successfully";
        //redirect to manage pg
        header('location:'.SITEURL.'admin/Service-provider.php');
    }
    else{
        //failed to update manager
        $_SESSION['update'] = "Failed to delete the Service Provider's Account ";
        //redirect to manage pg
        header('location:'.SITEURL.'admin/Service-provider.php');
    }
}

?>



<?php
include('partials/Footer.php');
?>