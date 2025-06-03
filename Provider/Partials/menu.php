<?php 
include('../Config/constants.php');
?>
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
    <link rel="stylesheet" href="home.css" />
    <title> Carmate | Carservice </title>
  </head>
  <body>
    <header class="header">
      <nav>
        <div class="nav__bar">
          <div class="logo nav__logo">
            <a href="http://localhost/New/Provider/index.php"><img src="../Pic/capture.jpg" alt="logo" /></a>
          </div>
          <div class="nav_menu_btn" id="menu-btn">
            <i class="ri-menu-3-line"></i>
          </div>
        </div>
        <ul class="nav__links" id="nav-links">
          <li><a href="http://localhost/New/Provider/index.php">HOME</a></li>
          <li><a href="http://localhost/New/Provider/Manage-Services.php">MANAGE SERVICE</a></li>
          <li><a href="http://localhost/New/Provider/manage-category.php">MANAGE CATEGORY</a></li>
          <li><a href="http://localhost/New/Provider/manage-orders.php">MANAGE ORDERS</a></li>
          <li><a href="http://localhost/New/Chatbot/index.html">CARMATE CHATBOT</a></li>
          <a href="http://localhost/New/Provider/Logout.php"><button class="btn"> Logout</button></a>
        </ul>
      </nav>
      </header>
  </body>
