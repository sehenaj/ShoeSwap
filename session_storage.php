<?php
// // Start session
// session_start();

// Connect to database
include("auth/database.php");
$conn = mysqli_connect($host, $username, $password, "sholler");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Retrieve user data from database
$sql = "SELECT * FROM USER WHERE USERNAME = '" . $_SESSION['user'] . "'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	// Store user data in session
	$row = mysqli_fetch_assoc($result);
	$_SESSION['fname'] = $row['FNAME'];
	$_SESSION['lname'] = $row['LNAME'];
	$_SESSION['email'] = $row['EMAIL_ID'];
	$_SESSION['password'] = $row['PASSWORD'];
	$_SESSION['address'] = $row['ADDRESS'];
	$_SESSION['city'] = $row['CITY'];
	$_SESSION['pin'] = $row['PIN'];
	$_SESSION['phone'] = $row['PHONE_NUMBER'];
	$_SESSION['security'] = $row['SECURITY_QUES'];
}



// Close database connection

?>
