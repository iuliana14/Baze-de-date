<?php 
session_start(); 
include "conn.php";

$sql = "SELECT Masina_ID, Individ_ID, NrInmatriculare, Firma, Model FROM masina";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {
    echo "ID: " . $row["Masina_ID"]. "<br>" . " Individ_ID: " . $row["Individ_ID"]. "<br>" . " NrInmatriculare: " . $row["NrInmatriculare"]. "<br>" . " Firma: " . $row["Firma"] . "<br>" . " Model: " . $row["Model"] ."<br>"
    . "<br>";
    

  }
} else {
  echo "0 results";
}
$conn->close();
?>
     <a href="page.php">Back</a>
   