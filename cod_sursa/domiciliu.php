
// afisaza datele din tabela domiciliu
<?php 
session_start(); 
include "conn.php";

$sql = "SELECT Domiciliu_ID, Judet, Localitate, Strada, Numar FROM domiciliu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {
    echo "ID: " . $row["Domiciliu_ID"]. "<br>" . " Judet: " . $row["Judet"]. "<br>" . " Localitate: " . $row["Localitate"]. "<br>" . " Strada: " . $row["Strada"] . "<br>" . " Numar: " . $row["Numar"] ."<br>"
    . "<br>";
    

  }
} else {
  echo "0 results";
}
$conn->close();
?>
     <a href="page.php">Back</a>
   
