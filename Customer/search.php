<?php include('Partials/Menu.php');?>

    <!-- service sEARCH Section Starts Here -->
    <section class="service-search text-center">
        <div class="container">
            <?php 
                 $search = $_POST['search'];
            ?>
            <h2> Search For<a href="#" class="text-white">"<?php echo $search;?>"</a></h2>

        </div>
    </section>
    <!-- Service Search Section Ends Here -->



    <!-- Service Menu Section Starts Here -->
    <section class="service-menu">
        <div class="container">
            <h2 class="text-center">Service Menu</h2>
            <?php
               
                 $sql = "SELECT * FROM services WHERE name LIKE '%$search%' OR description LIKE '%$search%' OR price LIKE '%$search%'";

                 $result = mysqli_query($conn, $sql);
                 $count = mysqli_num_rows($result);

                 if ($count > 0) {
                    //service available

                    while ($row = mysqli_fetch_array($result)) {
                        //get the values
                        $ID = $row['id'];
                        $Title= $row['name'];
                        $Price = $row['price'];
                        $Description= $row['description'];
                        $Image_name = $row['image_name'];
                        ?>
                                 <div class="service-menu-box">
                                <div class="service-menu-img">
                                    <?php 
                                        if ($Image_name == "") {

                                            echo "<div class 'error'> Image Not Available. </div>";
                                        }
                                        else
                                        {
                                            ?>
                                            <img src="<?php echo SITEURL;?>images/service/<?php echo $Image_name?>" alt="Searched Service" class="img-responsive img-curve">
                                            <?php
                                        }
                                    ?>
                                    
                                </div>

                                <div class="service-menu-desc">
                                    <h4><?php echo $Title;?></h4>
                                    <p class="service-price"><?php echo $Price;?></p>
                                    <p class="service-detail">
                                    <?php echo $Description;?>
                                    </p>
                                    <br>
                                        <a href="<?php echo SITEURL; ?>Provider/Booking.php?ID=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                                    </div>
                                </div>

                        <?php

                 }
                }
                else {
                    echo "<div class= 'error'> Service Not Found";
                }



            ?>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

 

    <?php include('Partials/Footer.php');?>

</body>
</html>