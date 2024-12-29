<?php
$con = mysqli_connect("localhost", "root", "", "studentprofiledb") or die(mysqli_connect_errno($con));

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM student_form WHERE id = $id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('No student found with this ID'); window.location.href='indexadmin.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid request'); window.location.href='indexadmin.php';</script>";
    exit();
}

if (isset($_POST['update'])) {
    $name = $_POST["name"];
    $semester = $_POST["semester"];
    $matrixnumber = $_POST["matrixnumber"];
    $faculty = $_POST["faculty"];
    $address = $_POST["address"];
    $cgpa = $_POST["cgpa"];
    $residence = $_POST["residence"];
    $mentor = $_POST["mentor"];
    $username = $_POST["username"];

    $updateQuery = "UPDATE student_form SET 
                    name = '$name', 
                    semester = '$semester', 
                    matrixnumber = '$matrixnumber', 
                    faculty = '$faculty', 
                    address = '$address', 
                    cgpa = '$cgpa', 
                    residence = '$residence', 
                    mentor = '$mentor', 
                    username = '$username' 
                    WHERE id = $id";

    if (mysqli_query($con, $updateQuery)) {
        echo "<script>alert('Student updated successfully'); window.location.href='indexadmin.php';</script>";
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
    <title>Edit Student</title>
    <style>
:root {
    --blue: #3498db;
    --dark-blue: #2980b9;
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
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-color: #f3f3f3;
    font-family: Arial, sans-serif;
	justify-content: center; 
	align-items: center; 
}

.container {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

h2 {
    text-align: center;
    color: #333;
}

form {
    width: 100%;
    max-width: 500px;
    padding: 40px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

label {
    font-weight: bold;
    margin: 10px 0 5px;
}

input[type="text"] {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 20px;
    width: 100%;
}

.btn {
    background-color: blue;
    color: var(--white);
    padding: 10px;
    width: 100%;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    font-size: 16px;
    margin-top: 10px;
    box-sizing: border-box;
}

.btn:hover {
    background-color: #2980b9;
}

.delete-btn {
    display: inline-block;
    background-color: var(--red);
    color: var(--white);
    padding: 10px;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
    margin-top: 10px;
    width: 100%;
}

.delete-btn:hover {
    background-color: var(--dark-red);
}

a {
    text-decoration: none;
}

@media (max-width: 650px) {
    form {
        padding: 20px;
    }
}

footer {
    text-align: center;
    background-color: var(--black);
    color: var(--white);
    padding: 10px;
    margin-top: auto;
}


    </style>
</head>
<body>
	<div class="update-profile">
        <form method="post">
		<h2 style="margin:0px" >Edit Student</h2>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $student['name']; ?>" required>

            <label for="semester">Semester:</label>
            <input type="text" name="semester" id="semester" value="<?php echo $student['semester']; ?>" required>

            <label for="matrixnumber">No. Matrix:</label>
            <input type="text" name="matrixnumber" id="matrixnumber" value="<?php echo $student['matrixnumber']; ?>" required>

            <label for="faculty">Faculty:</label>
            <input type="text" name="faculty" id="faculty" value="<?php echo $student['faculty']; ?>" required>

            <label for="address">Address:</label>
            <input type="text" name="address" id="address" value="<?php echo $student['address']; ?>" required>

            <label for="cgpa">CGPA:</label>
            <input type="text" name="cgpa" id="cgpa" value="<?php echo $student['cgpa']; ?>" required>

            <label for="residence">Residence:</label>
            <input type="text" name="residence" id="residence" value="<?php echo $student['residence']; ?>" required>

            <label for="mentor">Mentor:</label>
            <input type="text" name="mentor" id="mentor" value="<?php echo $student['mentor']; ?>" required>

            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php echo $student['username']; ?>" required>

            <button type="submit" name="update" class="btn">Update Student</button>
            <a href="indexadmin.php" class="delete-btn">Go back</a>
        </form>
	</div>
</body>
  <footer>
    <p>&copy; <?php echo date("Y"); ?> eStudent Profile. All rights reserved.</p>
  </footer>
</html>
