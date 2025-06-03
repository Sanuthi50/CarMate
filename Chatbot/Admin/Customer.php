<?php include ('partials/menu.php')?>
    <!--- Main content section starts -->
<div class="Main-content">
<div class="wrapper">
       <h1>
            Manage Customer Accounts
      </h1>
      <?php 
        if(isset($_SESSION['add']) )
        {
          echo $_SESSION['add']; //Displaying session message
          unset($_SESSION['add']); //Removing session message
        }


        if(isset($_SESSION['delete']) )
        {
          echo $_SESSION['delete']; //Displaying session message
          unset($_SESSION['delete']); //Removing session message
        }
        if(isset($_SESSION['update']) )
        {
          echo $_SESSION['update']; //Displaying session message
          unset($_SESSION['update']); //Removing session message
        }
        if(isset($_SESSION['user-not-found']) )
        {
          echo $_SESSION['user-not-found']; //Displaying session message
          unset($_SESSION['user-not-found']); //Removing session message
        }
        if(isset($_SESSION['pwd-not-match']) )
        {
          echo $_SESSION['pwd-not-match']; //Displaying session message
          unset($_SESSION['pwd-not-match']); //Removing session message
        }
        if(isset($_SESSION['change-pwd']) )
        {
          echo $_SESSION['change-pwd']; //Displaying session message
          unset($_SESSION['change-pwd']); //Removing session message
        }
        


        

      ?>
      <br><br>

      <!--Button to add admin-->

      <a href ="Add-Customer.php" class="btn-primary">Add Customer</a>
      <br><br>

      <table class=" tbl-full">
        <tr>
            <th>Serial No.</th>
            <th>Name</th>
            <th>username</th>
            <th>Actions</th>
        </tr>

        <?php
        //query to get all available customers

        $sql="SELECT*FROM customer";

        //execute the query 
        $res = mysqli_query($conn,$sql);

        $sn=1;//create a variable and assign the value

        //check whether the query is excecuted or not

        if($res==TRUE)
        {
          //count rows to check whether we have data in database or not
          $count = mysqli_num_rows($res);//function to get all the rows in database

          //check the num of rows
          if($count> 0){
            //we have data in the database
            while($rows=mysqli_fetch_assoc($res))
            {
              //using while loop to get the data from database.
              // and while loop will run as long as we have data in database

              //get indvidual data
              $ID= $rows["id"];
              $email=$rows['email'];
              $username = $rows['username'];

              //display the values in our table
              ?>
            <tr>
            <td><?php echo $sn++; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $username; ?></td>
            <td>
              <a href="<?php echo SITEURL;?>admin/update-Customerpass.php?ID=<?php echo $ID;?>"class="btn-primary2">Change Password</a>
               <a href ="<?php echo SITEURL;?>admin/update-customer.php?ID=<?php echo $ID;?>" class="btn-secondary">Update Customer</a>
               <a href ="<?php echo SITEURL;?>admin/delete-customer.php?ID=<?php echo $ID;?>" class="btn-tertiary">Delete Customer</a>             
            </td>
            <tr>


<?php

            }
          }
          else{
            //we don't have data in database
          }

        }
        
        ?>          
      
      </table>
<div class="clearfix"></div>
</div>
</div>
<!--- Main contant section ends -->
<?php include ('partials/Footer.php')?>