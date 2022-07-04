
// partea de login pentru administratorul bazei de date

<?php 
session_start(); 
include "conn.php";  // se realizeaza conectarea la baza de date

// daca sunt introduse username si parola corecte, atunci se realizeaza conectarea 

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

		if (empty($uname)) {
			header("Location: indx.php?error=Username is required");
		    exit();
		}else if(empty($pass)){
	        header("Location: indx.php?error=Password is required");
		    exit();
		}else{
			$sql = "SELECT * FROM user WHERE username='$uname' AND password='$pass'";

			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) === 1) {
				$row = mysqli_fetch_assoc($result);
	            if ($row['username'] === $uname && $row['password'] === $pass) {
	            	$_SESSION['username'] = $row['username'];
	            	$_SESSION['id'] = $row['id'];
	            	header("Location: page.php");
			        exit();
	            }else{
					header("Location: indx.php?error=Incorect Username or password");
			        exit();
				}
			}else{
				header("Location: indx.php?error=Incorect Username or password");
		        exit();
			}
		}
	
}else{
	header("Location: indx.php");
	exit();
}