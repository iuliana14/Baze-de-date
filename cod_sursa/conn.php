<?php

//conectarea la baza de date a politiei

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "politie";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
?>