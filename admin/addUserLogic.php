<?php
  require 'config/database.php';
  if (isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createPassword = filter_var($_POST['createPassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmPassword = filter_var($_POST['confirmPassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userRole'], FILTER_SANITIZE_NUMBER_INT);
    $avatar = $_FILES['avatar'];
    if (!$firstname) {
      $_SESSION['addUser'] = "Please enter your First name";
    } elseif (!$lastname) {
      $_SESSION['addUser'] = "Please enter your Last name";
    } elseif (!$username) {
      $_SESSION['addUser'] = "Please enter your Username";
    } elseif (!$email) {
      $_SESSION['addUser'] = "Please enter a valid email";
    } elseif (strlen($createPassword) < 8 ) {
      $_SESSION['addUser'] = "Password should be 8 characters or more";
    } elseif ($createPassword !== $confirmPassword) {
      $_SESSION['addUser'] = "Passwords do not match";
    } elseif (!$avatar['name']) {
      $_SESSION['addUser'] = "Please add an avatar image";
    } else {
    //hash the password
      $hashedPassword = password_hash($createPassword, PASSWORD_DEFAULT);

      // check if username or email exists
      $userCheckQuery = "SELECT * FROM users WHERE username='$username' OR email='$email'";
      $userCheckResult = mysqli_query($connection, $userCheckQuery);
      if (mysqli_num_rows($userCheckResult) > 0) {
        $_SESSION['addUser'] = "Username or Email already exists";
      } else {
        // give the avatar image a unique name
        $time = time(); // get a unique timestamp
        $avatarName = $time . $avatar['name'];
        $avatarTmpName = $avatar['tmp_name'];
        // the path we want to upload this image
        $avatarDesPath = '../images/users/' . $avatarName;
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
            $_SERVER['addUser'] = 'Image uploaded is too large, please upload image less than 1MB';
          }
        } else {
          $_SESSION['addUser'] = 'Require file in png, jpg, jpeg or webp';
        }
      }
    }
    if (isset($_SESSION['addUser'])) {
      // pass form data back to signup page
      $_SESSION['addUserData'] = $_POST;
      header('location: ' . rootURL . 'admin/addUser.php');
      die();
    } else {
      // if everything works well
      // insert new users into users table
      $insertUserQuery = "INSERT INTO users SET firstname='$firstname', lastname='$lastname', username='$username', email='$email', password='$hashedPassword', avatar='$avatarName', is_admin='$is_admin'";
  
      $insertUserResult = mysqli_query($connection, $insertUserQuery);
  
      if (!mysqli_errno($connection)) {
        // redirect to login page with success message
        $_SESSION['addUserSuccess'] = "New user $firstname $lastname has been added successfully";
        header('location: ' . rootURL . 'admin/manageUsers.php');
        die();
      } else {
        die(mysqli_errno($connection));
      }
    }
  } else {
    // if not clicked button(manually type the url to the page), go back to signup page
    header('location: ' . rootURL . 'admin/addUser.php');
    die();
  }