<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
  $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
  $previousThumbnailName = filter_var($_POST['previousThumbnail'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $categoryId = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
  $isFeatured = filter_var($_POST['isFeatured'], FILTER_SANITIZE_NUMBER_INT);
  $thumbnail = $_FILES['thumbnail'];

  // Set is_featured to 0 if Unchecked
  $isFeatured = $isFeatured == 1 ?: 0;

  // Validate form data
  if (!$title) {
    $_SESSION['editPost'] = "Please enter a title";
  } else if (!$categoryId) {
    $_SESSION['editPost'] = "Please select a category";
  } elseif (!$body) {
    $_SESSION['editPost'] = "Please enter the body";
  } else {
    if ($thumbnail['name']) {
      // delete previous one if we upoaded a new one
      $previousThumbnailPath = '../images/posts/' . $previousThumbnailName;
      if ($previousThumbnailPath) unlink($previousThumbnailPath);
      $time = time();
      $thumbnailName = $time . $thumbnail['name'];
      $thumbnailTmpName = $thumbnail['tmp_name'];
      $thumbnailDes = '../images/posts/' . $thumbnailName;
      // Make sure file is an image
      $allowedFiles = ['png', 'jpg', 'jpeg', 'webp'];
      $extension = explode('.', $thumbnailName);
      $extension = end($extension);
      if (in_array($extension, $allowedFiles)) {
        // make sure image  too large
        if ($thumbnail['size'] < 1000000) {
          // move uploaded file(temporary) to images folder
          move_uploaded_file($thumbnailTmpName, $thumbnailDes);
        } else {
          $_SERVER['editPost'] = 'Image uploaded is too large, please upload image less than 1MB';
        }
      } else {
        $_SESSION['editPost'] = 'Require file in png, jpg, jpeg or webp';
      }
    }
  }

  if (isset($_SESSION['editPost'])) {
    header('location: ' . 'index.php');
    die();
  } else {
    // Set is_featured for all posts to 0 if is_featured for this post is 1
    if ($isFeatured == 1) {
      $zeroFeaturedQuery = "UPDATE posts SET isFeatured=0";
      $zeroFeaturedResult = mysqli_query($connection, $zeroFeaturedQuery);
    }

    // Set thumbnail if a new one was uploaded, else keep old thumbnail name
    $thumbnailInsert = $thumbnailName ?? $previousThumbnailName;

    // Insert post into db
    $query = "UPDATE posts SET title='$title', body='$body', thumbnail='$thumbnailInsert', categoryId='$categoryId', isFeatured='$isFeatured' WHERE id=$id LIMIT 1";
    $result = mysqli_query($connection, $query);
  }
  if (!mysqli_errno($connection)) {
    $_SESSION['editPostSuccess'] = "Post $title updated successfully";
  } 
}

header('location: ' . 'index.php');
die();