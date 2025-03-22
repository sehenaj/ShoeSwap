<?php
session_start(); // start the session

// unset all session variables
unset($_SESSION['admin']);
unset($_SESSION['status']);


// destroy the session
session_destroy();

// redirect to the login page
header("Location: admin.php");
exit;
?>
