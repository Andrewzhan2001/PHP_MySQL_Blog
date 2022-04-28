<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
  // get form data
  $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  if (!$title) {
    $_SESSION['addCategory'] = "Please enter title";
  } elseif (!$description) {
    $_SESSION['addCategory'] = "Please enter description";
  }

  // Redirect back to add-category dpage if there was invalid input
  if (isset($_SESSION['addCategory'])) {
    $_SESSION['addCategoryData'] = $_POST;

    header('location: ' . 'addCategory.php');
    die();
  } else {
    //　Insert category info into db
    $query = "INSERT INTO categories (title, description) VALUES ('$title', '$description')";
    $result = mysqli_query($connection, $query);

    if (mysqli_errno($connection)) {
      $_SESSION['addCategory'] = "Error on adding category";
      header('location: ' . 'addCategory.php');
      die();
    } else {
      $_SESSION['addCategorySuccess'] = "Category $title has been added successfully";
      header('location: ' . 'manageCategories.php');
      die();
    }
  }
}