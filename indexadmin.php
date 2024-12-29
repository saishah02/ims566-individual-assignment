<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');
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
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
        background-color: #f3f3f3;
        font-family: 'Poppins', sans-serif;
    }
    .container {
      max-width: 900px;
      margin: 50px auto;
      padding: 20px;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
	  flex: 1;
    }
    h2 {
      text-align: center;
    }
    table {
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
    }
    table, th, td {
      border: 1px solid #ddd;
    }
    th, td {
      padding: 10px;
      text-align: center;
    }

	.btn {
    background-color: blue;
    padding: 5px 10px;
    color: white;
    border-radius: 5px;
    text-decoration: none;
	cursor: pointer;
	}

	.btn:hover {
		background-color: darkblue;
	}

	.delete-btn {
		background-color: red;
		color: white;
		padding: 5px 10px;
		text-decoration: none;
		border-radius: 5px;
		cursor: pointer;
	}

	.delete-btn:hover {
		background-color: darkred;
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

  <div class="container">
    <h2>Admin Dashboard</h2>
    <a href="add_student.php" class="btn">Add New Student</a>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Semester</th>
          <th>Matrix Number</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
		$con = mysqli_connect ("localhost", "root", "", "studentprofiledb") or die
		(mysqli_connect_errno($con));
		
		$query = "SELECT * FROM student_form";

		$result = mysqli_query($con, $query)or die
		("Query failed".mysqli_error($con));;
		while ($student = mysqli_fetch_array($result)) { ?>
          <tr>
            <td><?php echo $student['id']; ?></td>
            <td><?php echo $student['name']; ?></td>
            <td><?php echo $student['semester']; ?></td>
            <td><?php echo $student['matrixnumber']; ?></td>
            <td>
              <a href="edit_student.php?id=<?php echo $student['id']; ?>" class="btn">Edit</a>
              <a href="delete_student.php?id=<?php echo $student['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> eStudent Profile. All rights reserved.</p>
  </footer>

</body>
</html>

<?php mysqli_close($con); ?>
