
// afisaza datele din tabela individ
<?php 
session_start(); 
include "conn.php";

$sql = "SELECT Individ_ID, User_ID, Domiciliu_ID, Nume, Prenume, CNP, Sex, DataNasterii FROM individ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {
    echo "ID: " . $row["Individ_ID"]. "<br>" . " User_ID: " . $row["User_ID"]. "<br>". " Domiciliu_ID: " . $row["Domiciliu_ID"]. "<br>" . " Numele: " . $row["Nume"]. "<br>" . " Prenumele: " . $row["Prenume"]. "<br>". " CNP: " . $row["CNP"]. "<br>" . " Sex: " . $row["Sex"]. "<br>" . " DataNasterii: " . $row["DataNasterii"]. "<br>" .
    "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

<html>
<body>
     <a href="page.php">Back</a>
   
</body>
</html>
