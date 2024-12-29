<?php

$conn = mysqli_connect("localhost", "root", "", "studentprofiledb")
or die (mysqli_connect_errno($con));
session_start();
$username = $_SESSION['username'];

if(isset($_POST['update_profile'])){
   
   $update_username = mysqli_real_escape_string($conn, $_POST['update_username']);
   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_semester = mysqli_real_escape_string($conn, $_POST['update_semester']);
   $update_matrixnumber = mysqli_real_escape_string($conn, $_POST['update_matrixnumber']);
   $update_faculty = mysqli_real_escape_string($conn, $_POST['update_faculty']);
   $update_address = mysqli_real_escape_string($conn, $_POST['update_address']);
   $update_cgpa = mysqli_real_escape_string($conn, $_POST['update_cgpa']);
   $update_residence = mysqli_real_escape_string($conn, $_POST['update_residence']);
   $update_mentor = mysqli_real_escape_string($conn, $_POST['update_mentor']);

   mysqli_query($conn, "UPDATE `student_form` SET username = '$update_username', name = '$update_name', semester = '$update_semester', matrixnumber = '$update_matrixnumber', faculty = '$update_faculty', address = '$update_address',
   cgpa = '$update_cgpa', residence = '$update_residence', mentor = '$update_mentor'
   WHERE username = '$username'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, $_POST['update_pass']);
   $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
   $confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_pass']);

   $select = mysqli_query($conn, "SELECT * FROM `student_form` WHERE username = '$username'") or die('query failed');
   if(mysqli_num_rows($select) > 0){
      $fetch = mysqli_fetch_assoc($select);
   }

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $fetch['password']){
         $message[] = 'Old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'Confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `student_form` SET password = '$new_pass' WHERE username = '$username'") or die('query failed');
         $message[] = 'Password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'Image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `student_form` SET image = '$update_image' WHERE username = '$username'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'Image updated successfully!';
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Profile</title>
   <style>
   :root{
   --blue:#3498db;
   --dark-blue:#2980b9;
   --red:#e74c3c;
   --dark-red:#c0392b;
   --black:#333;
   --white:#fff;
   --light-bg:#eee;
   --box-shadow:0 5px 10px rgba(0,0,0,.1);
	}

	*{
		font-family: 'Poppins', sans-serif;
		margin:0; padding:0;
		box-sizing: border-box;
		outline: none; border: none;
		text-decoration: none;
	}

	*::-webkit-scrollbar{
	width: 10px;
	}

	*::-webkit-scrollbar-track{
	background-color: transparent;
	}

	*::-webkit-scrollbar-thumb{
	background-color: var(--blue);
	}

	body {
		font-family: Arial, sans-serif;
		background-color: #f3f3f3;
		margin: 0;
		padding: 0;
	}

	.update-profile{
		min-height: 100vh;
		background-color: var(--light-bg);
		display: flex;
		align-items: center;
		justify-content: center;
		padding:20px;
	}

	.update-profile form{
		padding:20px;
		background-color: var(--white);
		box-shadow: var(--box-shadow);
		text-align: center;
		width: 700px;
		text-align: center;
		border-radius: 5px;
	}

	.update-profile form img{
		height: 200px;
		width: 200p;
		border-radius: 50%;
		object-fit: cover;
		margin-bottom: 5px;
	}

	.update-profile form .flex{
		display: flex;
		justify-content: space-between;
		margin-bottom: 20px;
		gap:15px;
	}

	.update-profile form .flex .inputBox{
		width: 49%;
	}

	.update-profile form .flex .inputBox span{
		text-align: left;
		display: block;
		margin-top: 15px;
		font-size: 17px;
		color:var(--black);
	}

	.update-profile form .flex .inputBox .box{
	   width: 100%;
	   border-radius: 5px;
	   background-color: var(--light-bg);
	   padding:12px 14px;
	   font-size: 17px;
	   color:var(--black);
	   margin-top: 10px;
	}

	.btn {
		background-color: #007aff;
		padding: 10px;
		color: white;
		border-radius: 5px;
		text-decoration: none;
	}

	.btn:hover {
		background-color: #0056b3;
		box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
	}

	.delete-btn {
		background-color: var(--red);
		color: var(--white);
		padding: 10px;
		text-decoration: none;
		border-radius: 5px;
	}

	.delete-btn:hover {
		background-color: var(--dark-red);
	}

	.message{
	   margin:10px 0;
	   width: 100%;
	   border-radius: 5px;
	   padding:10px;
	   text-align: center;
	   background-color: var(--red);
	   color:var(--white);
	   font-size: 20px;
	}

	@media (max-width:650px){
	   .update-profile form .flex{
		  flex-wrap: wrap;
		  gap:0;
	   }
	   .update-profile form .flex .inputBox{
		  width: 100%;
	   }
	}
	footer {
        text-align: center;
        background-color: #333;
        color: white;
        padding: 10px;
        margin-top: auto; /* Pushes the footer to the bottom */
    }
	</style>
</head>
<body>

<div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `student_form` WHERE username = '$username'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="upload/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>Username :</span>
            <input type="text" name="update_username" value="<?php echo $fetch['username']; ?>" class="box">
            <span>Name :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
            <span>Semester :</span>
            <input type="text" name="update_semester" value="<?php echo $fetch['semester']; ?>" class="box">
            <span>Matrix number :</span>
            <input type="text" name="update_matrixnumber" value="<?php echo $fetch['matrixnumber']; ?>" class="box">
            <span>Faculty :</span>
            <input type="text" name="update_faculty" value="<?php echo $fetch['faculty']; ?>" class="box">
            <span>Address :</span>
            <input type="text" name="update_address" value="<?php echo $fetch['address']; ?>" class="box">
            <span>CGPA :</span>
            <input type="text" name="update_cgpa" value="<?php echo $fetch['cgpa']; ?>" class="box">
            <span>Residence :</span>
            <input type="text" name="update_residence" value="<?php echo $fetch['residence']; ?>" class="box">
            <span>Mentor :</span>
            <input type="text" name="update_mentor" value="<?php echo $fetch['mentor']; ?>" class="box">
            <span>Update your pic :</span>
            <input type="file" name="update_image" class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>Old password :</span>
            <input type="password" name="update_pass" placeholder="Enter previous password" class="box">
            <span>New password :</span>
            <input type="password" name="new_pass" placeholder="Enter new password" class="box">
            <span>Confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="Confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="Update profile" name="update_profile" class="btn">
      <a href="profilepage.php" class="delete-btn">Go back</a>
   </form>

</div>

</body>
  <footer>
    <p>&copy; <?php echo date("Y"); ?> eStudent Profile. All rights reserved.</p>
  </footer>
</html>
