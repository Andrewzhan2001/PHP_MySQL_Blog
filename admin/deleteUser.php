<?php 
require 'config/database.php';

if (isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
  $query = "SELECT * FROM users WHERE id = $id";
  $result = mysqli_query($connection, $query);
  $user = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) == 1) {
    $avatar = $user['avatar'];
    $avatarPath = '../images/users/' . $avatar;
    // delete the image if it exists
    if($avatarPath) {
      unlink($avatarPath);
    }
  }
  // we need to fetch and delete all thumbnails of user's posts
  $thumbnailsQuery = "SELECT thumbnail FROM posts WHERE authorId=$id";
  $thumbnailResults = mysqli_query($connection, $thumbnailsQuery);
  if (mysqli_num_rows($thumbnailResults) > 0) {
    while ($thumbnail = mysqli_fetch_assoc($thumbnailResults)) {
      $thumbnailPath = '.../images/posts/' . $thumbnail['thumbnail'];
      // delete thumbnail from dir
      if ($thumbnailPath) {
        unlink($thumbnailPath);
      }
    }
  }


  // delete the user from database table
  $deleteUserQuery = "DELETE FROM users WHERE id = $id";
  $deleteUserResult = mysqli_query($connection, $deleteUserQuery);
  if(mysqli_errno($connection)) {
    $_SESSION['deleteUser'] = "Error on delete user {$user['firstname']} {$user['lastname']}";
  } else {
    $_SESSION['deleteUserSuccess'] = "User {$user['firstname']} {$user['lastname']} has been deleted";
  }
}

header('location: ' . rootURL . 'admin/manageUsers.php');
die();

