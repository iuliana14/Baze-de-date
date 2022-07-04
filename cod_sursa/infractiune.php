
// afisaza datele din tabela infractiune
<?php 
session_start(); 
include "conn.php";

$sql = "SELECT Infractiune_ID, Denumire FROM infractiune";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {
    echo "ID: " . $row["Infractiune_ID"]. "<br>" . " Denumire: " . $row["Denumire"]. "<br>" 
    . "<br>";
    

  }
} else {
  echo "0 results";
}
$conn->close();
?>
     <a href="page.php">Back</a>
   