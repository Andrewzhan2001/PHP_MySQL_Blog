<?php
require 'config/constants.php';

// connect to the MySQL database
$connection = new mysqli(dbHost, dbUser, dbPass, dbName);

// check if we have any problem with connection
if (mysqli_errno($connection)) {
  // exit and print out the message
  die(mysqli_error($connection));
}