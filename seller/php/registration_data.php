<?php
session_start();
$loginname=$_SESSION['user'];
include('../../auth/database.php');
$conn=mysqli_connect($host,$username,$password,"sholler");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Extract data from form
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$city = $_POST['city'];
$pin = $_POST['pin'];
$phone_number = $_POST['phone_number'];



// ------------------Session data retrival---------------



$sql = "UPDATE seller SET FNAME='$fname', LNAME='$lname', ADDRESS='$address', CITY='$city', PIN='$pin', PHONE_NUMBER='$phone_number' WHERE USERNAME='$loginname'";

if (mysqli_query($conn, $sql)) {
    header("Location: ../homepage_seller.php");
} else {
    header("Location: ../regis_form.html");
}


?>


