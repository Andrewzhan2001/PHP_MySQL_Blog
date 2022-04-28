<?php
  // initialize session variables
  require 'config/database.php';

// get the form data
// we set form will send post message
// $_POST['submit'] hold information of whether button is clicked
if (isset($_POST['submit'])) {
  // sanitize the input data
  $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $createPassword = filter_var($_POST['createPassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $confirmPassword = filter_var($_POST['confirmPassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $avatar = $_FILES['avatar'];
  
  // if no firstname
  // put into session so we can display in different page
  if (!$firstname) {
    $_SESSION['signup'] = "Please enter your First name";
  } elseif (!$lastname) {
    $_SESSION['signup'] = "Please enter your Last name";
  } elseif (!$username) {
    $_SESSION['signup'] = "Please enter your Username";
  } elseif (!$email) {
    $_SESSION['signup'] = "Please enter a valid email address";
  } elseif (strlen($createPassword) < 8) {
    $_SESSION['signup'] = "Password should have 8 or more characters";
  } elseif ($createPassword !== $confirmPassword ) {
    $_SESSION['signup'] = "Passwords do not match";
  } elseif (!$avatar['name']) {
    $_SESSION['signup'] = "Please add an avatar image";
  } else {
    //hash the password
    $hashedPassword = password_hash($createPassword, PASSWORD_DEFAULT);

    // check if username or email exists
    $userCheckQuery = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $userCheckResult = mysqli_query($connection, $userCheckQuery);
    if (mysqli_num_rows($userCheckResult) > 0) {
      $_SESSION['signup'] = "Username or Email already exists";
    } else {
      // give the avatar image a unique name
      $time = time(); // get a unique timestamp
      $avatarName = $time . $avatar['name'];
      $avatarTmpName = $avatar['tmp_name'];
      // the path we want to upload this image
      $avatarDesPath = 'images/users/' . $avatarName;
      $allowedFiles = ['png', 'jpg', 'jpeg', 'webp'];
      $extension = explode('.', $avatarName);
      // get the extension of the file
      $extension = end($extension);
      if (in_array($extension, $allowedFiles)) {
        // make sure image  too large
        if ($avatar['size'] < 1000000) {
          // move uploaded file(temporary) to images folder
          move_uploaded_file($avatarTmpName, $avatarDesPath);
        } else {
          $_SERVER['signup'] = 'Image uploaded is too large, please upload image less than 1MB';
        }
      } else {
        $_SESSION['signup'] = 'Require file in png, jpg, jpeg or webp';
      }
    }
  }
  // redirect to signup page if error
  if (isset($_SESSION['signup'])) {
    // pass form data back to signup page
    $_SESSION['signupData'] = $_POST;
    header('location: ' . 'signup.php');
    die();
  } else {
    // if everything works well
    // insert new users into users table
    $insertUserQuery = "INSERT INTO users SET firstname='$firstname', lastname='$lastname', username='$username', email='$email', password='$hashedPassword', avatar='$avatarName', is_admin=0";

    $insertUserResult = mysqli_query($connection, $insertUserQuery);

    if (!mysqli_errno($connection)) {
      // redirect to login page with success message
      $_SESSION['signupSuccess'] = 'Registration successful. Please log in your account';
      header('location: ' . 'signin.php');
      die();
    } else {
      die(mysqli_errno($connection));
    }
  }
} else {
  // if not clicked button(manually type the url to the page), go back to signup page
  header('location: ' . 'signup.php');
  die();
}