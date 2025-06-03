<?php include('Partials/Menu.php');?>
<?php
if(isset($_GET['Category_ID']))
{
    $category_id = $_GET['Category_ID'];
    $sql = "SELECT name FROM category WHERE id = $category_id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $category_title = $row["name"];


}
else
{
    header('location:'.SITEURL.'Customer/Services.php');
}
?>

    <!--  sEARCH Section Starts Here -->
    <section class="service-search text-center">
        <div class="container">
            
            <h2>Services on <a href="#" class="text-white">"<?php echo $category_title;?>"</a></h2>

        </div>
    </section>
    <!--  sEARCH Section Ends Here -->



    <!-- MEnu Section Starts Here -->
    <section class="service-menu">
        <div class="container">
            <h2 class="text-center">Service Menu</h2>
            <?php
            $sql2 = "SELECT*FROM services WHERE category_id = $category_id";
            $result2 = mysqli_query($conn,$sql2);
            $count2 = mysqli_num_rows($result2);
            if($count2 > 0)
            {
                while($row2 = mysqli_fetch_assoc($result2))
                {
                    $ID = $row2['id'];
                    $title = $row2['name'];
                    $Price = $row2['price'];
                    $Description= $row2['description'];
                    $Image_name = $row2['image_name'];
                    ?>
                     <div class="service-menu-box">
                     <div class="service-menu-img">
                        <?php
                        if($Image_name=="")
                        {
                            echo "<div class = 'error'> Image not Available. </div>";
                        }
                        else{
                        ?>
                      
                        <img src="<?php echo SITEURL;?>images/service/<?php echo $Image_name;?>" alt="Service in the category" class="img-responsive img-curve">
                        <?php
                    }
                    ?>
                   
                   </div>
                     <div class="service-menu-desc">
                         <h4><?php echo $title;?></h4>
                            <p class="service-price"><?php echo $Price;?></p>
                            <p class="service-detail">
                                <?php echo $Description;?>
                                </p>
                                <br>

                             <a href="<?php echo SITEURL; ?>Customer/booking.php?ID=<?php echo $ID;?>" class="btn btn-primary">Order Now</a>
                   
                    </div>
                     </div> 
                    <?php
                    
                }   
            }
            else
            {
                echo"<div class = 'error'>Service not available. </div>";
            }
            
            ?>

<div class="clearfix"></div>
</div>        

    </section>
    <!-- Menu Section Ends Here -->



    <?php include('Partials/Footer.php');?>

</body>
</html>