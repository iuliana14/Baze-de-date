
// modificari pentru tabela domiciliu: insert, delete, update
<DOCTYPE!>
<?php
$con = mysqli_connect("localhost","root","","politie");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

//Adauga un domiciliu
if ( !empty($_GET['Judet'])
	&& !empty($_GET['Localitate']) && !empty($_GET['Strada']) && !empty($_GET['Numar'])) {
     
function validate($data){
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
     }


    $Judet=$_GET['Judet'];
	$Localitate=$_GET['Localitate'];
	$Strada=$_GET['Strada'];
	$Numar=$_GET['Numar'];

    $sql = "INSERT INTO domiciliu (Judet, Localitate, Strada, Numar)
            VALUES ('$Judet', '$Localitate', '$Strada', '$Numar')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script>alert('Wow! Insert Completed.')</script>";
        $Judet = "";
        $Localitate = "";
        $Strada = "";
        $Numar = "";
        } else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
          
}

//sterge toate datele domiciliului cu judetul precizat
if(isset($_GET['delete']) && !empty($_GET['Judet']) && !empty($_GET['Localitate'])){
					$id=$_GET['Judet'];
					$id1=$_GET['Localitate'];
					$sql="DELETE FROM domiciliu WHERE Judet='$_GET[Judet]' AND Localitate='$_GET[Localitate]'";
					mysqli_query($con, $sql) or die(mysql_error());
				}

//Modifica numarul strazii domiciliului cu judetul precizat				
if(isset($_GET['modifica']) && !empty($_GET['Numar'])){
					$id=$_GET['Localitate'];
					$id1=$_GET['Strada'];
					$sql="UPDATE domiciliu SET Numar=$_GET[Numar] WHERE Localitate='$id' AND Strada='$id1'";
		
					mysqli_query($con, $sql) or die(mysql_error());
				}
				
?>
<html>

	<head>
		<title> Domiciliu </title>
		
		<link rel="stylesheet"href="style.css" media="all" />
	</head>
	
<body>

	<div class="main_wrapper">
		

		<div class="content_wrapper">

		<form method="GET">
			Judet: <input type="text" name="Judet" >
			Localitate: <input type="text" name="Localitate" >
			Strada: <input type="text" name="Strada" >
			Numar: <input type="text" name="Numar" >
			<input type="submit" name="insert" value="INSERT">
			
		</form>

		<form method="GET">
			Nume judet: <input type="text" name="Judet" >
			Nume localitate: <input type="text" name="Localitate" >
			<input type="submit" name="delete" value="DELETE">
			
			</form><br/></br>
			
			<form method="GET">
			Nume localitate: <input type="text" name="Localitate" >
			Nume strada: <input type="text" name="Strada" >
			Numarul strazii: <input type="text" name="Numar" >
			<input type="submit" name="modifica" value="UPDATE">
			
			</form>
			
		</div>
			
		
		</div>
	
	
	</div>


  <a href="page.php">Back</a>
</body>

</html>