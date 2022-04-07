<?php
  require '../config/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP and MYSQL Blog Website</title>
<!--  style sheet -->
  <link rel="stylesheet" href="<?= rootURL?>css/style.css">
<!-- iconsount cdn(content delivery network) -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
  <!-- for the navigation bar -->
  <nav>
    <div class="container navContainer">
      <a href="<?= rootURL?>" class="navLogo">ANDREW</a>
      <ul class="navItems">
        <li><a href="<?= rootURL?>blog.php">Blog</a></li>
        <li><a href="<?= rootURL?>about.php">About</a></li>
        <li><a href="<?= rootURL?>services.php">Services</a></li>
        <li><a href="<?= rootURL?>contact.php">Contact</a></li>
        <!-- <li><a href="<?= rootURL?>signin.php">Signin</a></li> -->
        <li class = "navProfile">
          <div class="avatar">
            <img src="<?= rootURL?>images/avatar1.jpg" alt="avatar">
          </div>
          <ul>
            <li><a href="<?= rootURL?>admin/index.php">Dashboard</a></li>
            <li><a href="<?= rootURL?>logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
      <button id = "openNavBtn"><i class="uil uil-bars"></i></button>
      <button id = "closeNavBtn"><i class="uil uil-multiply"></i></button>
    </div>
  </nav>