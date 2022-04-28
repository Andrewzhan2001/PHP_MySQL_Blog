<?php require 'config/constants.php';

// destroy all sessions & redirect use to home page
session_destroy();
header('location: ' . 'index.php');
die();