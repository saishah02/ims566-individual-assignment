<?php
$con = mysqli_connect ("localhost", "root", "", "studentprofiledb") or die
(mysqli_connect_errno($con));
session_start();
$username = $_SESSION['username'];
if(!(isset($_SESSION['username'])))
{
	die ('<br><br><a href="login.php">Please click here to login</a></center>');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

    <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">
   <div class="profile">
      <?php
         
		$select = mysqli_query($con, "SELECT * FROM `student_form` WHERE username = '$username'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if ($fetch['image'] == '') {
            echo '<img src="images/default-avatar.png">';
         } else {
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      <h3><?php echo $_SESSION['name']; ?></h3>
      <a href="update_profile.php" class="btn">Update Profile</a>
      <a href="logout.php" class="delete-btn">Logout</a>
      <p>New? <a href="login.php">Login</a> or <a href="register.php">Register</a></p>
   </div>
</div>
  <footer>
    <p>&copy; <?php echo date("Y"); ?> eStudent Profile. All rights reserved.</p>
  </footer>
</body>
</html>
