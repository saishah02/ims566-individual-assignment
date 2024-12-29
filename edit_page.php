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
    <link rel="stylesheet" href="css/css.style">
</head>
<body>
    <div class="container">
        <h2>Edit Student</h2>
        <form method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $student['name']; ?>" required>
            <br>

            <label for="semester">Semester:</label>
            <input type="text" name="semester" id="semester" value="<?php echo $student['semester']; ?>" required>
            <br>

            <label for="matrixnumber">No. Matrix:</label>
            <input type="text" name="matrixnumber" id="matrixnumber" value="<?php echo $student['matrixnumber']; ?>" required>
            <br>

            <label for="faculty">Faculty:</label>
            <input type="text" name="faculty" id="faculty" value="<?php echo $student['faculty']; ?>" required>
            <br>

            <label for="address">Address:</label>
            <input type="text" name="address" id="address" value="<?php echo $student['address']; ?>" required>
            <br>

            <label for="cgpa">CGPA:</label>
            <input type="text" name="cgpa" id="cgpa" value="<?php echo $student['cgpa']; ?>" required>
            <br>

            <label for="residence">Residence:</label>
            <input type="text" name="residence" id="residence" value="<?php echo $student['residence']; ?>" required>
            <br>

            <label for="mentor">Mentor:</label>
            <input type="text" name="mentor" id="mentor" value="<?php echo $student['mentor']; ?>" required>
            <br>

            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php echo $student['username']; ?>" required>
            <br>

            <button type="submit" name="update" class="btn">Update Student</button>
        </form>
    </div>
</body>
</html>
