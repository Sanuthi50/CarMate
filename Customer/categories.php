<?php include('Partials/Menu.php');?>
   <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Service Categories</h2>

            <?php
            //display categories (active)
            $sql = "SELECT * FROM category WHERE Active='Yes'"; 

            //execute
            $res = mysqli_query($conn,$sql);

            //count rows
            $count = mysqli_num_rows($res);

            if($count>0)
            {
                //category available
                    while($row = mysqli_fetch_array($res))
                        {
                            //get the values
                            $ID = $row['id'];
                            $Title = $row['name'];
                            $Image_name = $row['image_name'];

                           ?>
                            <a href="<?php echo SITEURL;?>Customer/Category-Service.php?Category_ID=<?php echo $ID; ?>">
                            <div class="box-3 float-container">
                                <?php
                                if($Image_name == "")
                                {
                                    echo "<div class='error'>Image not found</div>";
                                }
                                else
                                {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $Image_name;?>"alt="category" class="img-responsive img-curve"width="20px" height="300px">
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
                //category not available
                echo "<div class='error'>Category not found</div>";
            }
    
            
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->
 <?php include('Partials/footer.php');?>

</body>
</html>