<?php
// Include the necessary files
include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Services</h1>
        <br><br>
        <?php 
        // Display session messages
        if(isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        } 
        if(isset($_SESSION['unauthorized'])) {
            echo $_SESSION['unauthorized'];
            unset($_SESSION['unauthorized']);
        }
        if(isset($_SESSION['upload1'])) {
            echo $_SESSION['upload1'];
            unset($_SESSION['upload1']);
        }
        if(isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if(isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if(isset($_SESSION['update1'])) {
            echo $_SESSION['update1'];
            unset($_SESSION['update1']);
        }
        ?>
        <br><br>
        <a href="<?php echo SITEURL; ?>Provider/add-services.php" class="btn-primary">Add Services</a>
        <br><br>

        <table class="tbl-full">
            <tr>
                <th>Serial no.</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            <?php
              // Use the logged-in user's ID for provider_id
              $provider_id = $_SESSION['user_id']; // Get the logged-in user's ID from session
            $sql = "SELECT * FROM services WHERE provider_id= $provider_id";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $sn = 1;

            if($count > 0) {
                while($row = mysqli_fetch_assoc($res)) {
                    $ID = $row['id'];
                    $Title = $row['name'];
                    $Price = $row['price'];
                    $Image_name = $row['image_name'];
                    $active = $row['active'];
                    ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo htmlspecialchars($Title); ?></td>
                        <td>Rs.<?php echo htmlspecialchars($Price); ?></td>
                        <td>
                            <?php 
                            if($Image_name == "") {
                                echo "<div class='error'>Image not added.</div>";
                            } else {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/Service/<?php echo $Image_name; ?>" width="100px">
                                <?php
                            }
                            ?>
                        </td>
                        <td><?php echo htmlspecialchars($active); ?></td>
                        <td>
                            <a href="<?php echo SITEURL; ?>Provider/update-services.php?ID=<?php echo $ID; ?>" class="btn-update">Update Service</a>
                           <br><br> <a href="<?php echo SITEURL; ?>Provider/delete-services.php?ID=<?php echo $ID; ?>&Image_name=<?php echo $Image_name; ?>" class="btn-tertiary">Delete Service</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='6'>Services are not added yet.</td></tr>";
            }
            ?>
        </table>
    </div>
</div>

<?php include('partials/Footer.php'); // Optionally omit the closing tag ?>
