
// partea de register pentru admin, in cazul in care acesta nu are deja un cont

<?php 

include "conn.php";

error_reporting(0);

session_start();

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cpassword'])) {
     
function validate($data){
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
     }

     $username = validate($_POST['username']);
     $email = validate($_POST['email']);
     $password = validate($_POST['password']);
     $cpassword = validate($_POST['cpassword']);

     // daca parola initial introdusa este aceeasi cu parola reintrodusa, atunci se realizeaza contul
     if ($password == $cpassword) {
          $sql = "SELECT * FROM user WHERE email='$email'";
          $result = mysqli_query($conn, $sql);
          if (!$result->num_rows > 0) {
               $sql = "INSERT INTO user (username, email, password)
                         VALUES ('$username', '$email', '$password')";
               $result = mysqli_query($conn, $sql);
               if ($result) {
                    echo "<script>alert('Wow! User Registration Completed.')</script>";
                    $username = "";
                    $email = "";
                    $_POST['password'] = "";
                    $_POST['cpassword'] = "";
               } else {
                    echo "<script>alert('Woops! Something Wrong Went.')</script>";
               }
          } else {
               echo "<script>alert('Woops! Email Already Exists.')</script>";
          }
          
     } else {
          echo "<script>alert('Password Not Matched.')</script>";
     }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register here</title>
	<link rel="stylesheet" type="text/css" href="css_page.css">
</head>
<body>
     <form action="" method="post">
     	<h2>Register here</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Username</label>
     	<input type="text" name="username" placeholder="Enter Username" value="<?php echo $username; ?>" required><br>

          <label>Email</label>
          <input type="email" name="email" placeholder="Enter Email" value="<?php echo $email; ?>" required><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Enter Password" value="<?php echo $_POST['password']; ?>" required><br>

          <label>Confirm Password</label>
          <input type="password" name="cpassword" placeholder="Confirm Password" value="<?php echo $_POST['cpassword']; ?>" required><br>

     	<button type="submit">Register</button>
          <br></br>
          <p class="register-text">Already have an account? <a href="indx.php">Login Here</a></p>
          
     </form>
</body>
</html>