<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");  // Redirect to login page if not logged in
    exit();
}

// Connect to the database
$con = mysqli_connect("localhost", "root", "", "studentprofiledb") or die(mysqli_connect_errno($con));

// Get the logged-in user's username
$username = $_SESSION['username'];  // This assumes the username is stored in the session

// Fetch student details from the database
$query = "SELECT * FROM student WHERE username = '$username'";
$carian = mysqli_query($con, $query) or die(mysqli_error($con));
$data = mysqli_fetch_array($carian);

// Close the database connection
mysqli_close($con);

// Include the HTML page and pass data
include('profilepage.php');
?>
