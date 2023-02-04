<?php
require 'config/database.php';

if (isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

  // Fetch post from database in order to delete thumbnail from images folder;
  $query = "SELECT * FROM posts WHERE id='$id'";
  $result = mysqli_query($connection, $query);

  // Make sure only one rowwas fetched
  if (mysqli_num_rows($result) == 1) {
    $post = mysqli_fetch_assoc($result);
    $thumbnailName = $post['thumbnail'];
    $thumbnailPath = '../images/posts/' . $thumbnailName;

    // delete the image
    if ($thumbnailPath) {
      unlink($thumbnailPath);

      // delete from database
      $deletePostQuery = "DELETE FROM posts WHERE id=$id LIMIT 1";
      $deletePostResult = mysqli_query($connection, $deletePostQuery);


      if (!mysqli_errno($connection)) {
        $title = $post['title'];
        $_SESSION['deletePostSuccess']  = "Post $title deleted successfully";
      } else {
        $_SESSION['deletePost']  = "Error get on deleting the post $title";
      }
    }
  }
}

header('location: ' . 'index.php');
die();