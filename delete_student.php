<?php
$con = mysqli_connect("localhost", "root", "", "studentprofiledb") or die(mysqli_connect_errno($con));

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM student_form WHERE id = $id";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Student deleted successfully'); window.location.href='indexadmin.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "'); window.location.href='indexadmin.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request'); window.location.href='indexadmin.php';</script>";
}

mysqli_close($con);
?>
