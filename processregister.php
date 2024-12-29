<?php
$name=$_POST["name"];
$semester=$_POST["semester"];
$matrixnumber=$_POST["matrixnumber"];
$faculty=$_POST["faculty"];
$address=$_POST["address"];
$cgpa=$_POST["cgpa"];
$residence=$_POST["residence"];
$mentor=$_POST["mentor"];
$username=$_POST["username"];
$password=$_POST["password"];
$status='user';


$con = mysqli_connect("localhost", "root", "", "studentprofiledb")
or die (mysqli_connect_errno($con));

mysqli_query($con, "insert into student_form (name, semester, matrixnumber, faculty, address, cgpa, residence , mentor, username, password, status)
values ('$name', '$semester', '$matrixnumber', '$faculty', '$address', '$cgpa', '$residence', '$mentor', '$username', '$password', '$status')") or die
(mysqli_error($con));

header("location: profilepage.php");

mysqli_close($con)
?>