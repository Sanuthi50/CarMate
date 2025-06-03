<?php include ('partials/menu.php') ?>
<div class="main-content">
   <div class="wrapper">
      <h1>Manage Orders</h1>
      <br>
      <br><br><?php     if(isset($_SESSION['Cancel']) )
        {
          echo $_SESSION['Cancel']; //Displaying session message
          unset($_SESSION['Cancel']); //Removing session message
        }
        if(isset($_SESSION['Delivered']) )
        {
          echo $_SESSION['Delivered']; //Displaying session message
          unset($_SESSION['Delivered']); //Removing session message
        }?>
    

      <table class=" tbl-full">
         <tr>
            <th>Serial no.</th>
            <th>Order Number</th>
            <th>Service</th>
            <th>Date</th>
            <th>Time</th>
            <th>Contact</th>
            <th>Vehicle Model</th>
            <th>Status</th>
            <th>Actions</th>
         </tr>
         <?php
            $provider_id = $_SESSION['user_id'];
         $sql = "SELECT*FROM booking WHERE p_id =$provider_id";
         $res = mysqli_query($conn, $sql);
         $count = mysqli_num_rows($res);
         //create serial no. vriable and assign value as 1
         $sn = 1;

         //check whether we have data in database or not
         if ($count > 0) {
            //we have data in database
            //get the data and display or not
            while ($row = mysqli_fetch_array($res)) {
                $id = $row['id'];
                $service_type = $row['Service_Type']; // Fixed variable name case
                $date = $row['date'];
                $time = $row['time'];
                $contact_number = $row['Contact_Number']; // Fixed typo in column name
                $vehicle_model = $row['Vehicle_Model'];
                $Status = $row['status'];
               
               ?>
               <tr>
                  <td><?php echo $sn++; ?></td>
                  <td><?php echo $id; ?></td>
                  <td><?php echo $service_type; ?></td>
                  <td><?php echo $date; ?></td>
                  <td><?php echo substr($time, 0, 5); ?></td>
                 <td><?php echo $contact_number; ?></td>
                 <td><?php echo $vehicle_model; ?></td>
                 <td><?php echo $Status; ?></td>
                  <td>
                     <a href="<?php echo SITEURL; ?>provider/cancel-order.php?ID=<?php echo $id; ?>" class="btn-tertiary"> Cancel
                        </a>
                    <br><br> <a href="<?php echo SITEURL; ?>provider/deliver-order.php?ID=<?php echo $id; ?>"
                        class="btn-update">Deliverd</a>
                  </td>
               </tr>


               <?php
            }
         } else {
            //we donot have data 
            //we'll display the message inside table
            echo "<div class = 'error'> No Records</div>";

         }
         ?>

      </table>
   </div>
</div>
<?php include ('partials/Footer.php') ?>