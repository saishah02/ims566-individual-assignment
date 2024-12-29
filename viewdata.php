<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Data</title>
    
    	
    <style type="text/css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');
				:root{
		   --blue:#007aff;
		   --dark-blue:#0056b3;
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
            font-family: 'Poppins', sans-serif;
            margin: 0 px;
            padding: 0 px;
            background-color: #f3f3f3;
            color: #333;
            line-height: 1.6;
        }

        h1 {
            text-align: center;
            margin: 20px 0 40px;
            font-size: 2.5em;
            color: #007bff;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-header {
            background-color: #007bff;
			margin:0 px;
            color: #fff;
            padding: 20px 20px;
            font-size: 1.5em;
        }

        .card-body {
            padding: 20px;
        }

        .profile-info p {
            margin: 0 0 10px;
            font-size: 1em;
            color: #555;
        }

        .profile-info p strong {
            color: #007bff;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 2em;
            }

            .card-header {
                font-size: 1.3em;
            }

            .profile-info p {
                font-size: 0.9em;
            }
        }
    </style>
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-5">Student Profiles</h1>
        <?php
        // Database connection
        $con = mysqli_connect("localhost", "root", "", "studentprofiledb") or die(mysqli_connect_errno($con));

        // Query to fetch data from the student table
        $carian = mysqli_query($con, "SELECT * FROM student_form") or die(mysqli_error($con));

        // Loop through the results and display them
        while ($data = mysqli_fetch_array($carian)) {
            echo '<div class="card">';
            echo '    <div class="card-header">';
            echo '        <h4>' . $data['name'] . '</h4>';
            echo '    </div>';
            echo '    <div class="card-body">';
            echo '        <div class="profile-info">';
            echo '            <p><strong>Semester:</strong> ' . $data['semester'] . '</p>';
            echo '            <p><strong>No. Matrix:</strong> ' . $data['matrixnumber'] . '</p>';
            echo '            <p><strong>Faculty:</strong> ' . $data['faculty'] . '</p>';
            echo '            <p><strong>Address:</strong> ' . $data['address'] . '</p>';
            echo '            <p><strong>CGPA:</strong> ' . $data['cgpa'] . '</p>';
            echo '            <p><strong>Residence:</strong> ' . $data['residence'] . '</p>';
            echo '            <p><strong>Mentor:</strong> ' . $data['mentor'] . '</p>';
            echo '            <p><strong>Username:</strong> ' . $data['username'] . '</p>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
        }

        // Close the database connection
        mysqli_close($con);
        ?>
    </div>
<footer>
        <p>&copy; <?php echo date("Y"); ?> eStudent Profile. All rights reserved.</p>
    </footer>
    
    
</body>
</html>
