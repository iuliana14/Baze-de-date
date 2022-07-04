
// pagina principala de unde se ppot accesa datele bazei de date si modificarile acesteia
<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1><p style="font-size:50px">Welcome to database, <?php echo $_SESSION['username']; ?>!</p></h1>
     <a href="individ.php">Date Indivizi</a>&nbsp;
     <a href="domiciliu.php">Date Domicilii</a>&nbsp;
     <a href="masina.php">Date Masini</a>&nbsp;
     <a href="cazier.php">Date Cazier</a>&nbsp;
     <a href="infractiune.php">Date Infractiuni</a>&nbsp;
     <a href="cazierinfractiune.php">Date Cazier-Infractiuni</a>&nbsp;
     <a href="update.php">Modificari Indivizi</a>&nbsp;
     <a href="update_domiciliu.php">Modificari Domiciliu</a>&nbsp;
     <a href="join.php">Cautare date personale indivizi</a>&nbsp;
     <a href="join2.php">Cautare date publice indivizi</a>&nbsp;
     <a href="subquery.php">Cautare particulara indivizi</a>&nbsp;
     <a href="logout.php">Logout</a>
</body>
</html>


<?php 
}else{
     header("Location: indx.php");
     exit();
}
 ?>

