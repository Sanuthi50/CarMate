
<?php include('Partials/Menu.php');?>
    <!-- Service Search Section Starts Here -->
    <section class="Service-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>/Provider/Service-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Services.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Service Search Section Ends Here -->


    <!-- Categories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center"> Service Categories</h2>

            <?php
            //create sql query to display categories
            $sql = "SELECT * FROM category WHERE Active = 'yes' LIMIT 3";
            //excecute query
            $res = mysqli_query($conn,$sql);
             //availability
            $count = mysqli_num_rows($res);

            if($count > 0)
            {
                //categories available
                while($row = mysqli_fetch_array($res))
                {
                    //get the values
                    $ID = $row['id'];
                    $Title = $row['name'];
                    $Image_name = $row['image_name'];
                    ?>

                    <a href="<?php echo SITEURL;?>Provider/Category-Services.php?Category_ID=<?php echo $ID; ?>">
                    <div class="box-3 float-container">
                        <?php 
                            if($Image_name == "")
                            {
                                //display message
                                echo " <div class = 'error'>Image is not available</div>";
                            }
                            else {
                                //image available
                                ?>
                                 <img src="<?php echo SITEURL;?>images/category/<?php echo $Image_name;?>" alt="category" class="img-responsive img-curve" width="20px" height="300px">

                                <?php

                            }
                        ?>

                       
                        <h3 class="float-text text-white"><?php echo $Title;?></h3>
                    </div>
                    </a>


                    <?php
                }

            }
            else 
            {
                //categories not available
                echo "<div class = 'error'> Category is not available..!</div>";
            }
            
            ?>
            

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- Service Menu Section Starts Here -->
    <section class="service-menu">
        <div class="container">
            <h2 class="text-center">Service Menu</h2>

            <?php
             $provider_id = $_SESSION['user_id'];
            $sql2 = "SELECT * FROM services WHERE Active='Yes' AND provider_id = $provider_id LIMIT 10";

            $res2 = mysqli_query($conn,$sql2);

            $count2 = mysqli_num_rows($res2);
            if($count2 > 0)
            {
                while($row2 = mysqli_fetch_array($res2))
                {
                    $id = $row2['id'];
                    $title = $row2['name'];
                    $price = $row2['price'];
                    $Description= $row2['description'];
                    $image_name = $row2['image_name'];

                    ?>
                <div class="Service-menu-box">
                <div class="Service-menu-img">
                <?php
                if($image_name=="")
                {
                    echo "<div class='error'>Image is not available </div>";
                }
                else
                {
                    ?>
                <img src="<?php echo SITEURL; ?>images/service/<?php echo $image_name;?>" alt="Service" class="img-responsive img-curve"width="10px" height="100px">
                <?php
                }
    ?>  
                           
                        </div>

                        <div class="Service-menu-desc">
                            <h4><?php echo $title;?></h4>
                            <p class="Service-price">Rs.<?php echo $price;?></p>
                            <p class="Service-detail">
                              <?php echo $Description;?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>Provider/update-services.php?ID=<?php echo $id;?>" class="btn btn-primary">Update</a>
                        </div>
                    </div>

                    <?php

                }
            }

            else
            {
                echo "<div class='error'>Service is not available </div>";
            }


            ?>      


           
            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="<?php echo SITEURL;?>/Provider/manage-Services.php">See All Services</a>
        </p>
    </section>
    <!-- Service Menu Section Ends Here -->
    <?php
// Query to fetch feedback data from the database
$query2 = "SELECT*FROM feedback ORDER BY Date DESC";

// Execute the query
$result = mysqli_query($conn, $query2);

// Error handling for failed query
if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}
?>

<section id="customer-feedbacks">
    <h2>Customer Feedback</h2>

    <?php
    // Check if there are any feedbacks to display
    if (mysqli_num_rows($result) > 0): ?>
        <ul id="feedback-list">
            <?php
            // Fetch each row from the query result
            while ($row = mysqli_fetch_assoc($result)) {
                // Store feedback details in variables
                $feedback = $row['Feedback'];
                $feedback_date = $row['Date'];
            ?>
                <!-- Display feedback details -->
                <li>
                    <p><strong>Feedback:</strong> <?php echo $feedback; ?></p>
                    <p><small><strong>Date:</strong> <?php echo $feedback_date; ?></small></p>
                </li>
                <hr>
            <?php } ?>
        </ul>
    <?php else: ?>
        <!-- Display message if no feedbacks are found -->
        <p>No feedbacks found.</p>
    <?php endif; ?>
</section>


    

    <?php include('partials/Footer.php');?>

</body>
</html>