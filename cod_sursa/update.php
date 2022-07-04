
// modificarile tabelei individ: delete, update
<DOCTYPE!>
<?php
$con = mysqli_connect("localhost","root","","politie");
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


//sterge toate datele unui individ cu numele precizat
if(isset($_GET['delete']) && !empty($_GET['Nume']) && !empty($_GET['Prenume'])){
					$id=$_GET['Nume'];
					$id1=$_GET['Prenume'];
					$sql="DELETE FROM individ WHERE Nume='$_GET[Nume]' AND Prenume='$_GET[Prenume]'";
					mysqli_query($con, $sql) or die(mysql_error());
				}

//Modifica DataNasterii a individului cu numele cautat				
if(isset($_GET['modifica']) && !empty($_GET['DataNasterii'])){
					$id=$_GET['Nume'];
					$id1=$_GET['Prenume'];
					$sql="UPDATE individ SET DataNasterii=$_GET[DataNasterii] WHERE Nume='$id' AND Prenume='$id1'";
		
					mysqli_query($con, $sql) or die(mysql_error());
				}
				
?>
<html>

	<head>
		<title> Indivizi </title>
		
		<link rel="stylesheet"href="style.css" media="all" />
	</head>
	
<body>

	<div class="main_wrapper">
		

		<div class="content_wrapper">

		<form method="GET">
			Nume individ: <input type="text" name="Nume" >
			Prenume individ: <input type="text" name="Prenume" >
			<input type="submit" name="delete" value="DELETE">
			
			</form><br/></br>
			
			<form method="GET">
			Nume individ: <input type="text" name="Nume" >
			Prenume individ: <input type="text" name="Prenume" >
			Noul DataNasterii: <input type="text" name="DataNasterii" >
			<input type="submit" name="modifica" value="UPDATE">
			
			</form>
			
		</div>
		
			
		
		</div>
	
	</div>

  <a href="page.php">Back</a>
</body>

</html>