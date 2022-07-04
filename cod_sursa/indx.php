
// Interfata de inceput, de login
<!DOCTYPE html>
<html>
<head>
	<title>Login here</title>
	<link rel="stylesheet" type="text/css" href="css_page.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>Login here</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Username</label>
     	<input type="text" name="uname" placeholder="Enter Username"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Enter Password"><br>

     	<button type="submit">Login</button>
          <br></br>
          <p class="register-text">Don't have an account? <a href="register.php">Register Here</a></p>
     </form>

</body>

</html>