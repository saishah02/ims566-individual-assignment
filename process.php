<?php

$con = mysqli_connect ("localhost", "root", "", "studentprofiledb") or die
(mysqli_connect_errno($con));
session_start();

if(isset($_POST["username"]))
{
$username=$_POST["username"];
$password=$_POST["password"];

$semak= mysqli_query($con, "SELECT * from student_form where username='$username'
AND password='$password'") or die (mysqli_error($con));

$bilrekod=mysqli_num_rows($semak);

if ($bilrekod==0)
{
$message [] ='Wrong username or password';
}
else
{
$_SESSION["username"]=$username;

$datarekod=mysqli_fetch_array($semak);

if ($datarekod['status']=="user")
{
header("location: profilepage.php");
$_SESSION["username"] = $username;
$_SESSION['name'] = $datarekod['name']; 

}
elseif($datarekod['status']=="ADMIN")
{
header ("location: indexadmin.php");
}
}
}
?>