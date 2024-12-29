<?php
$con = mysqli_connect("localhost", "root", "", "studentprofiledb") or die(mysqli_connect_errno($con));

if (isset($_POST['submit'])) {
$name=$_POST["name"];
$semester=$_POST["semester"];
$matrixnumber=$_POST["matrixnumber"];
$faculty=$_POST["faculty"];
$address=$_POST["address"];
$cgpa=$_POST["cgpa"];
$residence=$_POST["residence"];
$mentor=$_POST["mentor"];
$username=$_POST["username"];
$status='user';
$randomPassword = bin2hex(random_bytes(4));
    $query = "INSERT INTO student_form (name, semester, matrixnumber, faculty, address, cgpa, residence , mentor, username, password, status)
	VALUES ('$name', '$semester', '$matrixnumber', '$faculty', '$address', '$cgpa', '$residence', '$mentor', '$username', '$randomPassword', '$status')";
    
	if (mysqli_query($con, $query)) {
        echo "<script>alert('Student added successfully'); window.location.href='indexadmin.php';</script>"
		;
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
	<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

:root {
    --blue: #007aff;
    --dark-blue: #0056b3;
    --red: #e74c3c;
    --dark-red: #c0392b;
    --black: #333;
    --white: #fff;
    --light-bg: #eee;
    --box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

* {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;
}

*::-webkit-scrollbar {
    width: 10px;
}

*::-webkit-scrollbar-track {
    background-color: transparent;
}

*::-webkit-scrollbar-thumb {
    background-color: var(--blue);
}

body {
    margin: 0;
    min-height: 150vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #f3f3f3;
}

.container {
    width: 350px;
    padding: 20px 30px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    margin: auto; /* Centers the container vertically in relation to other content */
}

h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    color: #555;
    display: block;
    margin-top: 15px;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
}

.btn {
    background-color: var(--blue);
    color: var(--white);
    border: none;
    border-radius: 5px;
    padding: 10px 15px;
    cursor: pointer;
    text-align: center;
    display: block;
    width: 100%;
    font-size: 16px;
    margin-top: 20px;
    transition: all 0.3s ease-in-out;
}

.btn:hover {
    background-color: var(--dark-blue);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

footer {
    text-align: center;
    background-color: var(--black);
    color: var(--white);
    padding: 10px;
    margin-top: auto; /* Ensures the footer stays at the bottom */
    width: 100%; /* Footer spans the full width of the page */
}

	</style>
</head>
<body>
    <div class="container">
        <h2>Add New Student</h2>
	<form name="register" method="post" action="add_student.php">

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>
    <br>

    <label for="semester">Semester:</label>
    <input type="text" name="semester" id="semester" required>
    <br>

    <label for="matrixnumber">No. Matrix:</label>
    <input type="text" name="matrixnumber" id="matrixnumber" required>
    <br>

    <label for="faculty">Faculty:</label>
    <input type="text" name="faculty" id="faculty" required>
    <br>

    <label for="address">Address:</label>
    <input type="text" name="address" id="address" required>
    <br>

    <label for="cgpa">CGPA:</label>
    <input type="text" name="cgpa" id="cgpa" required>
    <br>

    <label for="residence">Residence:</label>
    <input type="text" name="residence" id="residence" required>
    <br>

    <label for="mentor">Mentor:</label>
    <input type="text" name="mentor" id="mentor" required>
    <br>

    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <br>

    <button type="submit" name="submit" class="btn">Add Student</button>
</form>
</div>
</body>
  <footer>
    <p>&copy; <?php echo date("Y"); ?> eStudent Profile. All rights reserved.</p>
  </footer>
</html>
