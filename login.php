<!doctype html>
<html>
<head>
  <title>Login</title>
  <style>
 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

  * {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
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
    margin: 10;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
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
    background-color: #0056b3 !important;
    color: white;
    transform: scale(1.05);
  }

  form {
    width: 400px;
    padding: 40px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  form input[type="text"],
  form input[type="password"],
  form input[type="submit"] {
    width: 100%;
    margin-bottom: 15px;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-sizing: border-box;
  }

  form input[type="submit"] {
    background-color: #007aff;
    color: white;
    border: none;
    cursor: pointer;
  }

  form input[type="submit"]:hover {
    background-color: #0056b3;
  }

  .message {
    margin: 10px 0;
    width: 100%;
    border-radius: 5px;
    padding: 10px;
    text-align: center;
    background-color: #e74c3c;
    color: white;
    font-size: 20px;
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
    margin-top: auto; /* Ensures footer stays at the bottom */
    width: 100%;
  }

  </style>
</head>
<body>
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

  <!-- Form centered in the page -->
  <form name="login" method="post" action="process.php">
    <h1 style="margin: 0px">Log in</h1>
    <br>
	<?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
     ?>
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br>

    <input type="submit" name="submit" value="Log in"> <br>

    <div class="login-link">
      Don't have an account? <a href="register.php">Register</a>
    </div>
  </form>
</body>
 <footer>
    <p>&copy; <?php echo date("Y"); ?> eStudent Profile. All rights reserved.</p>
  </footer>
</html>
