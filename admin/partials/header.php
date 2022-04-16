<?php
  require '../partials/header.php';
  // if not login, can not access any admin pages
  if (!isset($_SESSION['userId'])) {
    header('location: ' . rootURL . 'signin.php');
    die();
  }
?>
