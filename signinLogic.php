<?php
  require 'config/database.php';

  if (isset($_POST['submit'])) {
    $usernameEmail = filter_var($_POST['usernameEmail'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  
    if (!$usernameEmail) {
      $_SESSION['signin'] = "Require Username or Email";
    } elseif (!$password) {
      $_SESSION['signin'] = "Require Password";
    } else {
  
      // fetch user from database
      $fetchUserQuery = "SELECT * FROM users WHERE username='$usernameEmail' OR email='$usernameEmail'";
      $fetchUserResult = mysqli_query($connection, $fetchUserQuery);
      
      // if only one user in database
      if (mysqli_num_rows($fetchUserResult) == 1) {
        // Convert result into associative array
        // fetch the next row of result as array
        $userRecord = mysqli_fetch_assoc($fetchUserResult);
        $dbPassword = $userRecord['password'];
        // Compare the password
        // check the hashed matched with password
        if (password_verify($password, $dbPassword)) {
          // set session for access control
          $_SESSION['userId'] = $userRecord['id'];
  
          // set session if user is an admin
          if ($userRecord['is_admin'] == 1) {
            $_SESSION['userIsAdmin'] = true;
          }
          // log user in
          $_SESSION['username'] = $userRecord['username'];
  
          header('location: ' . 'admin/');
        } else {
          // if no user found
          $_SESSION['signin'] = "Password doesn't match record. Please try again.";
        }
      } else {
        $_SESSION['signin'] = "User not found";
      }
    }
  
    // if there are any problems, redirect to signin page with login data
    if (isset($_SESSION['signin'])) {
      $_SESSION['signinData'] = $_POST;
      header('location: ' . 'signin.php');
      die();
    }
  } else {
    // if button not pressed
    header('location: ' . 'signin.php');
    die();
  }