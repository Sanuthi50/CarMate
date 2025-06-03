<?php include('Partials/Menu.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="Service-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>/Customer/search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- Service Section Starts Here -->
    <section class="service-menu">
        <div class="container">
            <h2 class="text-center">Service Menu</h2>

            <?php
            $sql = "SELECT * FROM services WHERE Active='Yes'";

            $res = mysqli_query($conn,$sql);

            $count = mysqli_num_rows($res);
            if($count > 0)
            {
                while($row = mysqli_fetch_array($res))
                {
                    $ID = $row['id'];
                    $title = $row['name'];
                    $price = $row['price'];
                    $Description= $row['description'];
                    $image_name = $row['image_name'];

                    ?>
         <div class="service-menu-box">
          <div class="service-menu-img">
         <?php
         if($image_name=="")
         {
             echo "<div class='error'>Image is not available </div>";
         }
         else
        {
            ?>
           <img src="<?php echo SITEURL; ?>images/service/<?php echo $image_name;?>" alt="Service" class="img-responsive img-curve" width = "10px" height = "100px">
           <?php
         }
    ?>  
                           
                        </div>

                        <div class="service-menu-desc">
                            <h4><?php echo $title;?></h4>
                            <p class="service-price">Rs.<?php echo $price;?></p>
                            <p class="service-detail">
                              <?php echo $Description;?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>/Customer/booking.php?ID=<?php echo $ID;?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>

                    <?php

                }
            }

            else
            {
                echo "<div class='error'>Food is not available </div>";
            }


            ?>      

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

  

    <?php include('Partials/Footer.php');?>

</body>
</html>