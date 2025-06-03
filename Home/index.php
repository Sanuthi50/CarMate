<?php include('../Config/constants.php');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="Main.css" />
    <title>CarMate | Carserving</title>
  </head>
  <body>
    <header class="header">
      <nav>
        <div class="nav__bar">
          <div class="logo nav__logo">
            <a href="#"><img src="../Pic/Capture.JPG" alt="logo" /></a>
          </div>
          <div class="nav_menu_btn" id="menu-btn">
         
          </div>
        </div>
        <ul class="nav__links" id="nav-links">
          <li><a href="#home">HOME</a></li>
          <li><a href="#about">ABOUT</a></li>
          <li><a href="#service">SERVICE</a></li>
          <li><a href="#price">PRICE</a></li>
          <li><a href="#client">CLIENT</a></li>
          <li><a href="#contact">CONTACT US</a></li>
          <a href="../Admin/login.php"><button class="btn"> Admin</button></a>
          <a href="../Provider/login.php"><button class="btn"> Provider</button></a>
          <a href="../Customer/login.php"><button class="btn"> Customer</button></a>
        </ul>
      </nav>
    </header>
  

    <section class="banner__container">
      <div class="banner__card">
      <img src="../Pic/BC1.jpg" alt="banner" />
      </div>
      <div class="banner__card">
      <img src="../Pic/BC2.jpg" alt="banner" />
      </div>
      <div class="banner__image">
        <img src="../Pic/01 (1).jpg" alt="banner" />
      </div>
    </section>

    <section class="section_container experience_container" id="about">
      <div class="experience__image">
        <img src="../Pic/01 (2).jpg" alt="experience" />
      </div>
      <div class="experience__content">
        <p class="section__subheader">WHO WE ARE</p>
        <h2 class="section__header">
          We Have 25 Years Of Experience In This Field
        </h2>
        <p class="section__description">
          With a rich legacy spanning 25 years, our commitment to excellence in
          car servicing is unwavering. Our seasoned team brings a wealth of
          experience to ensure your vehicle receives top-notch care. Trust in
          our expertise to keep your car running smoothly and safely.
        </p>
        <a href="http://localhost/New/Home/About.php" style="text-decoration: none;">
    <button class="btn">Read More</button>
</a>


      </div>
      <section class="service" id="service" style="background-color: #f8f9fa; padding: 40px 20px; text-align: center;">
    <div class="section_container service_container" style="max-width: 1200px; margin: 0 auto;">
        <p class="section__subheader" style="font-size: 18px; color: #343a40; margin-bottom: 10px;">WHY CHOOSE US</p>
        <h2 class="section__header" style="font-size: 36px; color: #da042a; margin-bottom: 20px;">Great Car Service</h2>
        
        <div class="service__grid" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px;">

            <?php
            // Display categories (active)
            $sql = "SELECT * FROM services WHERE Active='Yes'"; 

            // Execute
            $res = mysqli_query($conn, $sql);

            // Count rows
            $count = mysqli_num_rows($res);

            if ($count > 0) {
                // Category available
                while ($row = mysqli_fetch_array($res)) {
                    // Get the values
                    $ID = $row['id'];
                    $Title = $row['name'];
                    $Image_name = $row['image_name'];
                    $Des = $row['description'];
                    $price = $row['price'];

                    if ($Image_name == "") {
                        echo "<div class='error' style='color: red;'>Image not found</div>";
                    } else {
            ?>
                        <div class="service__card" style="background: white; border: 1px solid #ced4da; border-radius: 8px; padding: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); width: 250px; text-align: left;">
                            <img src="<?php echo SITEURL; ?>images/service/<?php echo $Image_name; ?>" alt="Service" style="width: 100%; height: auto; border-radius: 8px; margin-bottom: 10px;">
                            <h4 style="font-size: 24px; color: #343a40; margin-bottom: 10px;"><?php echo $Title; ?></h4>
                            <p style="font-size: 16px; color: #6c757d; margin-bottom: 10px;"><?php echo $Des; ?></p>
                            <p style="font-size: 18px; font-weight: bold; color: #28a745;">Price: Rs.<?php echo $price; ?></p>
                        </div>
            <?php
                    }
                }
            } else {
                // Category not available
                echo "<div class='error' style='color: red;'>Category not found</div>";
            }
            ?>

            <div class="clearfix"></div>
        </div>
    </div>
</section>


    <section class="customisation">
      <div class="section_container customisation_container">
        <p class="section__subheader">OUR CUSTOMISATION</p>
        <h2 class="section__header2">
          Car Serving Matched with Great Workmanship
        </h2>
        <p class="section__description">
          Our dedicated team of skilled technicians and mechanics takes pride in
          delivering top-tier servicing for your beloved vehicle.
        </p>
        <div class="customisation__grid">
          <div class="customisation__card">
            <h4>65</h4>
            <p>Total Projects</p>
          </div>
          <div class="customisation__card">
            <h4>165</h4>
            <p>Transparency</p>
          </div>
          <div class="customisation__card">
            <h4>463</h4>
            <p>Done Projects</p>
          </div>
          <div class="customisation__card">
            <h4>5063</h4>
            <p>Got Awards</p>
          </div>
        </div>
      </div>
    </section>

    <section class="section_container price_container" id="price">
      <p class="section__subheader">BEST PACKAGES</p>
      <h2 class="section__header">Our Pricing Plans</h2>
      <p class="section__description">
        We offer a range of affordable and flexible pricing options.
      </p>
      <div class="price__grid">
        <div class="price__card">
          <h4>SILVER PACKAGE</h4>
          <h3><sup>$</sup>35</h3>
          <p>Routine Maintenance</p>
          <p>Diagnostic Services</p>
          <p>Wheel Alignment</p>
          <p>Brake and Suspension</p>
          <p>Air Conditioning</p>
          <p>Scheduled Maintenance</p>
          <button class="btn">Go Basic</button>
        </div>
        <div class="price__card">
          <div class="price_card_ribbon">BESTSELLER</div>
          <h4>PLATINUM PACKAGE</h4>
          <h3><sup>$</sup>69</h3>
          <p>Routine Maintenance</p>
          <p>Diagnostic Services</p>
          <p>Engine Tune-Ups</p>
          <p>Tire Sales and Services</p>
          <p>Exhaust System Repairs</p>
          <p>Scheduled Maintenance</p>
          <button class="btn">Go Premium</button>
        </div>
        <div class="price__card">
          <h4>GOLD PACKAGE</h4>
          <h3><sup>$</sup>39</h3>
          <p>Routine Maintenance</p>
          <p>Diagnostic Services</p>
          <p>Brake and Suspension</p>
          <p>Scheduled Maintenance</p>
          <p>Wheel Alignment</p>
          <p>Air Conditioning</p>
          <button class="btn">Go Standard</button>
        </div>
      </div>
    </section>

    <section class="contact">
      <div class="section_container contact_container">
        <div class="contact__content">
          <p class="section__subheader">CONTACT US</p>
          <h2 class="section__header2">Imagine Your Car Feeling New Again</h2>
          <p class="section__description">
            Experience the magic of a rejuvenated ride as we pamper your car
            with precision care, leaving it feeling as good as new.
          </p>
          <div class="contact__btns">
            <button class="btn">Our Services</button>
            <button class="btn">Contact Us</button>
          </div>
        </div>
      </div>
    </section>
<?php
// Query to fetch feedback data from the database
$query2 = "SELECT * FROM feedback ORDER BY Date DESC";

// Execute the query
$result = mysqli_query($conn, $query2);

// Error handling for failed query
if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}
?>
<section class="section_container testimonial_container" id="client" style="max-width: 800px; margin: auto; padding: 20px;">
    <?php
    // Check if there are any feedbacks to display
    if (mysqli_num_rows($result) > 0): ?>
        <p class="section__subheader" style="text-align: center; font-size: 1.5em;">CLIENT TESTIMONIALS</p>
        <h2 class="section__header" style="text-align: center; font-size: 2em; margin-bottom: 20px;">100% Approved By Customers</h2>
        <!-- Slider main container -->
        <div class="swiper" style="position: relative; overflow: hidden;">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper" style="display: flex; transition: transform 0.5s ease;">
                <!-- Slides -->
                <?php
                // Fetch each row from the query result
                while ($row = mysqli_fetch_assoc($result)) {
                    // Store feedback details in variables
                    $feedback = $row['Feedback'];
                    $feedback_date = $row['Date'];
                ?>
                    <div class="swiper-slide" style="flex: 0 0 100%; display: flex; justify-content: center; align-items: center; padding: 20px;">
                        <div class="testimonial__card" style="border: 1px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                            <img src="../Pic/bg2.jpg" alt="testimonial" style="width: 100px; height: 100px; border-radius: 50%; margin-bottom: 15px;" />
                            <p style="font-size: 1.2em; margin-bottom: 10px;"><?php echo $feedback; ?></p>
                            <h4 style="font-style: italic; color: #555;">- <?php echo $feedback_date; ?></h4>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination" style="position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%);"></div>
        </div>
        <hr style="margin-top: 20px;">
    <?php else: ?>
        <!-- Display message if no feedbacks are found -->
        <p style="text-align: center; font-size: 1.2em;">No feedbacks found.</p>
    <?php endif; ?>
</section>


<footer style="background-color: #282c34; color: white; padding: 20px 0; position: relative; bottom: 0; width: 100%; text-align: center;">
  <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-around;">
    <div class="footer__col" style="flex: 1; margin: 0 10px;">
      <h4 style="border-bottom: 2px solid #61dafb; padding-bottom: 10px;">Our Services</h4>
      <ul class="footer__links" style="list-style-type: none; padding: 0;">
        <li><a href="#" style="color: #61dafb; text-decoration: none;">Skilled Mechanics</a></li>
        <li><a href="#" style="color: #61dafb; text-decoration: none;">Routine Maintenance</a></li>
        <li><a href="#" style="color: #61dafb; text-decoration: none;">Customized Solutions</a></li>
        <li><a href="#" style="color: #61dafb; text-decoration: none;">Competitive Pricing</a></li>
        <li><a href="#" style="color: #61dafb; text-decoration: none;">Satisfaction Guaranteed</a></li>
      </ul>
    </div>
    <div class="footer__col" style="flex: 1; margin: 0 10px;">
      <h4 style="border-bottom: 2px solid #61dafb; padding-bottom: 10px;">Contact Info</h4>
      <ul class="footer__links" style="list-style-type: none; padding: 0;">
        <li>
          <p style="margin: 5px 0;">Experience the magic of a rejuvenated ride as we pamper your car with precision care</p>
        </li>
        <li>
          <p style="margin: 5px 0;">Phone: <span style="color: #61dafb;">+91 9876543210</span></p>
        </li>
        <li>
          <p style="margin: 5px 0;">Email: <span style="color: #61dafb;">info@carserving.com</span></p>
        </li>
      </ul>
    </div>
  </div>
</footer>

    <div class="footer__bar">
      Copyright © 2024 CarMate. All rights reserved.
    </div>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>