<?php
require 'config/database.php';

if (isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

  // when we delete a category, we change the post of this category to uncategorized
  $query = "SELECT id FROM categories WHERE title='Uncategorized' LIMIT 1";
  $result = mysqli_query($connection, $query);
  $row = mysqli_fetch_assoc($result);
  if (!$row) {
    $query2 = "INSERT INTO categories (title, description) VALUES ('Uncategorized', '')";
    mysqli_query($connection, $query2);
    $result2 = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result2);
    $selectedId = $row['id'];
  } else {
    $selectedId =  $row['id'];
  }
  $updateQuery = "UPDATE posts SET categoryId = $selectedId WHERE categoryId = $id";
  $updateResult = mysqli_query($connection, $updateQuery);
  if (!mysqli_errno($connection)) {
    $query = "DELETE FROM categories WHERE id=$id LIMIT 1";
    $result =  mysqli_query($connection, $query);
    $_SESSION['deleteCategorySuccess'] = "Category deleted successfully";
  }

}
header('location: ' . rootURL . 'admin/manageCategories.php');
die();