<?php 
include('../config/constants.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Wash Management System</title>
    <link rel="stylesheet" href="Admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="top-bar">
            <div class="contact-info">
                <p><i class="fas fa-envelope"></i> carmate@gmail.com</p>
                <p><i class="fas fa-phone"></i> +1-9876543210</p>
            </div>
            <div class="social-media">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="auth-links">
                <a href="Logout.php">Logout</a>
            </div>
        </div>
        <nav>
            <div class="logo">
                <img src="../Pic/Logo.png" alt="Car Wash Logo">
                <span>Car Mate</span>
            </div>
            <ul>
                <li><a href="http://localhost/carmate/admin/index.php">Home</a></li>
                <li><a href="http://localhost/carmate/admin/Service-provider.php">Service Providers</a></li>
                <li><a href="http://localhost/carmate/admin/Customer.php">Customers</a></li>
                <li><a href="#contact">Contact Us</a></li>
            </ul>
            
        </nav>
    