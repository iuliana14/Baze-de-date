
// afisaza datele din tabela cazierinfractiune
<?php 
session_start(); 
include "conn.php";

$sql = "SELECT Cazier_ID, Infractiune_ID, Data, Ora FROM cazierinfractiune";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {
    echo "ID: " . $row["Cazier_ID"]. "<br>" . " Infractiune_ID: " . $row["Infractiune_ID"]. "<br>" . " Data: " . $row["Data"]. "<br>" . " Ora: " . $row["Ora"] . "<br>"
    . "<br>";

  }
} else {
  echo "0 results";
}
$conn->close();
?>
     <a href="page.php">Back</a>