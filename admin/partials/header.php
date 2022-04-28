<?php
  require 'config/database.php';
  if (isset($_SESSION['userId'])) {
    $id = filter_var($_SESSION['userId'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id='$id'";
    $result = mysqli_query($connection, $query);
    $image = mysqli_fetch_assoc($result)['avatar'];
  }
  if (!isset($_SESSION['userId'])) {
    header('location: '  . '../signin.php');
    die();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP and MYSQL Blog Website</title>
<!--  style sheet -->
  <link rel="stylesheet" href="../css/style.css">
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
      <a href="../index.php" class="navLogo">ANDREW</a>
      <ul class="navItems">
        <li><a href="../blog.php">Blog</a></li>
        <li><a href="../about.php">About</a></li>
        <li><a href="../services.php">Services</a></li>
        <li><a href="../contact.php">Contact</a></li>
        <?php if(isset($_SESSION['userId'])) : ?>
          <li class = "navProfile">
            <div class="avatar">
              <img src="<?='../images/users/' . $image ?>" alt="avatar">
            </div>
            <ul>
              <li><a href="index.php">Dashboard</a></li>
              <li><a href="../logout.php">Logout</a></li>
            </ul>
          </li>
        <?php else : ?>
          <li><a href="../signin.php">Signin</a></li>
        <?php endif;?>
      </ul>
      <button id = "openNavBtn"><i class="uil uil-bars"></i></button>
      <button id = "closeNavBtn"><i class="uil uil-multiply"></i></button>
    </div>
  </nav>