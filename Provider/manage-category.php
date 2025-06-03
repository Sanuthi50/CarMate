<?php include ('partials/menu.php') ?>
<div class="main-content">
   <div class="wrapper">
      <h1>Manage Categories</h1>
      <br>
      <?php
      if (isset($_SESSION['add'])) {
         echo $_SESSION['add'];
         unset($_SESSION['add']);
      }
      if (isset($_SESSION['remove'])) {
         echo $_SESSION['remove'];
         unset($_SESSION['remove']);

      }

      if (isset($_SESSION['delete'])) {
         echo $_SESSION['delete'];
         unset($_SESSION['delete']);

      }

      if (isset($_SESSION['no-category-found'])) {
         echo $_SESSION['no-category-found'];
         unset($_SESSION['no-category-found']);

      }

      if (isset($_SESSION['update'])) {
         echo $_SESSION['update'];
         unset($_SESSION['update']);

      }
      if (isset($_SESSION['upload'])) {
         echo $_SESSION['upload'];
         unset($_SESSION['upload']);

      }


      ?>
      <br><br>

      <!--Button to add admin-->

      <a href="<?php echo SITEURL; ?>provider/add-category.php" class="btn-primary">Add Categories</a>
      <br><br>

      <table class=" tbl-full">
         <tr>
            <th>Serial no.</th>
            <th>Title</th>
            <th>Image</th>
            <th>Active</th>
            <th>Actions</th>
         </tr>
         <?php
         $sql = "SELECT*FROM category";
         $res = mysqli_query($conn, $sql);
         $count = mysqli_num_rows($res);
         //create serial no. vriable and assign value as 1
         $sn = 1;

         //check whether we have data in database or not
         if ($count > 0) {
            //we have data in database
            //get the data and display or not
            while ($row = mysqli_fetch_array($res)) {
               $ID = $row['id'];
               $title = $row['name'];
               $active = $row['active'];
               $Image_name = $row['image_name'];
               
               ?>
               <tr>
                  <td><?php echo $sn++; ?></td>
                  <td><?php echo $title; ?></td>

                  <td>
                     <?php
                     //check whether image name is available or not 
                     if ($Image_name != "") {
                        //display the image
                        ?>
                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $Image_name; ?>" width="100px">
                        <?php
                     } else {
                        //display the message
                        echo "<div class = 'error'> Image not added</div>";
                     }
                     ?>
                  </td>

                  <td><?php echo $active; ?></td>
                  <td>
                     <a href="<?php echo SITEURL; ?>provider/update-category.php?ID=<?php echo $ID; ?>" class="btn-update">Update
                        Category</a>
                    <br><br> <a href="<?php echo SITEURL; ?>provider/delete-category.php?ID=<?php echo $ID; ?>&Image_name=<?php echo $Image_name; ?>"
                        class="btn-tertiary">Delete Category</a>
                  </td>
               </tr>


               <?php
            }
         } else {
            //we donot have data 
            //we'll display the message inside table
            echo "<div class = 'error'> No Recorde is inserted!</div>";

         }
         ?>

      </table>
   </div>
</div>
<?php include ('partials/Footer.php') ?>