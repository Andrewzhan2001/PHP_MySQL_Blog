<?php
require 'config/database.php';
if (isset($_POST['submit'])) {
  // get the data
  $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
  $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $is_admin = filter_var($_POST['userRole'], FILTER_SANITIZE_NUMBER_INT);
  if (!$firstname || !$lastname) {
    $_SESSION['editUser'] = "Invalid Input. Please fill all the fields and edit user again";
  } else {
    $query = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', is_admin = '$is_admin' WHERE id=$id LIMIT 1";
    $result = mysqli_query($connection, $query);
    if(mysqli_errno($connection)) {
      $_SESSION['editUser'] = "Failed to update user. Please try again.";
    } else {
      $_SESSION['editUserSuccess'] = "User $firstname $lastname updated successfully";
    }
  }
}

header('location:' . 'manageUsers.php');
die();