<!doctype html>
<html>
<head>
  <title>Register</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');
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
	* {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      text-decoration: none;
    }

    *::-webkit-scrollbar {
      width: 10px;
    }

    *::-webkit-scrollbar-track {
      background-color: transparent;
    }

    *::-webkit-scrollbar-thumb {
      background-color: #007aff;
    }

    body {
      margin: 0;
      min-height: 100vh;
      display: flex;
      flex-direction: column; /* Makes the footer stay at the bottom */
      background-color: #f3f3f3;
      font-family: Arial, sans-serif;
    }

    .btn-group-vertical {
      position: absolute;
      top: 20px;
      left: 20px;
    }

    .custom-blue-button {
      background-color: blue;
      color: white;
      border: none;
      font-size: 18px;
      padding: 15px 30px;
      height: 60px;
      width: 200px;
      margin: 10px;
      text-align: center;
      border-radius: 10px;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.3s;
    }

    .custom-blue-button:hover {
      background-color: dark-blue;
      transform: scale(1.05);
    }

    .container {
      flex: 1; /* Fills available space to push the footer down */
      display: flex;
      justify-content: center; /* Centers horizontally */
      align-items: center;     /* Centers vertically */
      min-height: 100vh;       /* Ensures it takes the full viewport height */
    }

    form {
      width: 500px;
      padding: 40px;
      border: 1px solid #ccc;
      border-radius: 8px;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    form input[type="text"],
    form input[type="password"],
    form input[type="file"],
    form input[type="submit"] {
      width: 100%;
      margin-bottom: 15px;
      padding: 10px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 10px;
    }

    form input[type="submit"] {
      background-color: blue;
      color: white;
      border: none;
      cursor: pointer;
    }

    form input[type="submit"]:hover {
      background-color: dark-blue;
    }

    .login-link a {
      text-decoration: none;
      color: #007aff;
    }

    .login-link a:hover {
      text-decoration: underline;
    }

    footer {
      text-align: center;
      background-color: #333;
      color: white;
      padding: 10px;
    }
  </style>
</head>
<body>
  <!-- Buttons at the top-left -->
  <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
    <a href="viewdata.php">
      <button type="button" class="btn btn-primary custom-blue-button">Profile</button>
    </a><br>
    <a href="register.php">
      <button type="button" class="btn btn-primary custom-blue-button">Register</button>
    </a><br>
    <a href="login.php">
      <button type="button" class="btn btn-primary custom-blue-button">Login</button>
    </a>
  </div>

  <!-- Container to center the form -->
  <div class="container">
    <form name="register" method="post" action="processregister.php">
      <h1 style="margin-top: 0px">Register</h1>
      <br>
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

      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required>
      <br>

      <input type="submit" value="submit" name="submit">
      <br>

      <div class="login-link">
        Already have an account? <a href="login.php">Login</a>
      </div>
    </form>
  </div>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> eStudent Profile. All rights reserved.</p>
  </footer>
</body>
</html>
