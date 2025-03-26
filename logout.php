<?php
session_start(); // start the session

// unset all session variables
unset($_SESSION['fname']);
unset($_SESSION['lname']);
unset($_SESSION['email']);
unset($_SESSION['password']);
unset($_SESSION['address']);
unset($_SESSION['city']);
unset($_SESSION['pin']);
unset($_SESSION['phone']);
unset($_SESSION['security']);

// destroy the session
session_destroy();

// redirect to the login page
header("Location: login.php");
exit;
?>
