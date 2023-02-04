<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
  $authorId = $_SESSION['userId'];
  $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $categoryId = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
  $isFeatured = filter_var($_POST['isFeatured'], FILTER_SANITIZE_NUMBER_INT);
  $thumbnail = $_FILES['thumbnail'];

  // Set is_featured to 0 if Unchecked
  $isFeatured = $isFeatured == 1 ? : 0;

  // Validate form data
  if (!$title) {
    $_SESSION['addPost'] = "Please enter post title.";
  } elseif (!$categoryId) {
    $_SESSION['addPost'] = "Please select the category.";
  } elseif (!$body) {
    $_SESSION['addPost'] = "Please enter post body.";
  } elseif (!$thumbnail['name']) {
    $_SESSION['addPost'] = "Please upload the post thumbnail.";
  } else {
    $time = time();
    $thumbnailName = $time . $thumbnail['name'];
    $thumbnailTmpName = $thumbnail['tmp_name'];
    $thumbnailDes = '../images/posts/' . $thumbnailName;
    $allowedFiles = ['png', 'jpg', 'jpeg', 'webp'];
    $extension = explode('.', $thumbnailName);
    $extension = end($extension);
    if (in_array($extension, $allowedFiles)) {
      // make sure image  too large
      if ($thumbnail['size'] < 1000000) {
        // move uploaded file(temporary) to images folder
        move_uploaded_file($thumbnailTmpName, $thumbnailDes);
      } else {
        $_SERVER['addPost'] = 'Image uploaded is too large, please upload image less than 1MB';
      }
    } else {
      $_SESSION['addPost'] = 'Require file in png, jpg, jpeg or webp';
    }
  }
  if (isset($_SESSION['addPost'])) {
    $_SESSION['addPostData'] = $_POST;
    header('location: ' . 'addPost.php');
    die();
  } else {
    //we should have only one featured post in the database
    //when we add a featured post, set all other post to not featured
    if ($isFeatured == 1) {
      $zeroFeaturedQuery = "UPDATE posts SET isFeatured=0";
      $zeroFeaturedResult = mysqli_query($connection, $zeroFeaturedQuery);
    }
    $query = "INSERT INTO posts (title, body, thumbnail, categoryId, authorId, isFeatured) VALUES ('$title', '$body', '$thumbnailName', '$categoryId', '$authorId', '$isFeatured')";
    $result = mysqli_query($connection, $query);
    if (!mysqli_errno($connection)) {
      $_SESSION['addPostSuccess'] = "New post $title added successfully";
      header('location: ' . 'index.php');
      die();
    } 
  }
}
header('location: '. 'addPost.php');
die();
