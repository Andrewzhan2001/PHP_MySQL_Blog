<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
  $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
  $title = filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS);
  $description = filter_var($_POST['description'], FILTER_SANITIZE_SPECIAL_CHARS);


  //  Validate input
  if (!$title || !$description) {
    $_SESSION['editCategory'] = "You need to enter both title and description to create a category";
  } else {
    $query = "UPDATE categories SET title='$title', description='$description' WHERE id=$id LIMIT 1";
    $result = mysqli_query($connection, $query);
    if (mysqli_errno($connection)) {
      $_SESSION['editCategory'] = "Error on updating category";
    } else {
      $_SESSION['editCategorySuccess'] = "Category $title updated successfully";
    }
  }
}


header('location: ' . rootURL . 'admin/manageCategories.php');
die();