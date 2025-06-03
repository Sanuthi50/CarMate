<?php include('partials/Menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

    <?php
    if(isset($_GET['ID']))
    {
        $ID=$_GET['ID'];
    }
    ?>    
        <form action = "" method = "POST">
            <table class="tbl-30">
                <tr>
                     <td>
                        Current Password:
                     </td>
                     <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                     </td>
                </tr>
                <tr>
                     <td>New Password: </td>
                     <td>
                        <input type="password" name="new_password"placeholder="New Password">
                
                     </td>
                </tr>
                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder = "Confirm Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="ID"value=<?php echo $ID;?>>
                        <input type="submit" name="submit" value="Change Password" class="btn-primary">
                    </td>
                </tr>

            </table>
      </form>
  </div>
</div>

<?php
//check whether the submit button is clicked or not
if(isset($_POST['submit'])){
    //get the data from the form
    $ID=$_POST['ID'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);


    //check whether the user with current ID and current password exsist or not
    $sql="SELECT*FROM service_provider WHERE id=$ID AND Password = '$current_password'";

    //excecute query
    $res=mysqli_query($conn,$sql);  

if($res==true)
{

        //check whether data is available or not
         $count = mysqli_num_rows($res);

     if($count==1){

         //check whether the new password and confirm matching or not

         if($new_password==$confirm_password)
         {

                //Update the password
                $sql1="UPDATE service_provider SET Password ='$new_password' WHERE id = $ID";
                $res1=mysqli_query($conn,$sql); 

                //check whether the query executed or not
                        if($res1==true)
                            {
                                //display success message
                                //redirect to manage page with sucess message 
                                $_SESSION['change-pwd'] = "Password Changed Successfully.";
                                 header('location:'.SITEURL.'admin/manage-admin.php');
                                
                            }
          
                         else
                            {
                                //redirect to manage page with error message 
                                $_SESSION['change-pwd'] = " Failed to Change Password.";
                                header('location:'.SITEURL.'admin/Service-provider.php');
                            }
         }   
         else
             {
             //user do not Exist set message and redirect
             $_SESSION['pwd-not-match'] = "Password did not match...! ";
             header('location:'.SITEURL.'admin/Service-provider.php');

             }
            
     }
     else
     {
        //user do not Exist set message and redirect
        $_SESSION['user-not-found'] = "<div class='error'> User Not Found. </div>";
        header('location:'.SITEURL.'admin/Service-provider.php');
     }
}

    //check whether the new password and confirm password match or not

    //chang password if all are true

}


?>

<?php include('partials/Footer.php');?>