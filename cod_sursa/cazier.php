
//afisaza datele despre caziere
<?php 
session_start(); 
include "conn.php";

$sql = "SELECT Cazier_ID, Individ_ID, Data, Ora FROM cazier";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {
    echo "ID: " . $row["Cazier_ID"]. "<br>" . " Individ_ID: " . $row["Individ_ID"]. "<br>" . " Data: " . $row["Data"]. "<br>" . " Ora: " . $row["Ora"] . "<br>"
    . "<br>";
    

  }
} else {
  echo "0 results";
}
$conn->close();
?>
     <a href="page.php">Back</a>
   