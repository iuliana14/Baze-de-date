
// primele 3 interogari simple
<DOCTYPE!>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "politie";
  
$conn = new mysqli($servername, $username, $password, $dbname);

// 1. Toti indivizii care au firma masini: ...
if(isset($_GET['obtine']) && !empty($_GET['Firma']))
{

$id = $_GET['Firma'];
//echo "Nume si Prenume indivizi care au masina cu firma: ";
echo "<br>";
echo "<br>";                  

$sql = "SELECT  individ.Nume, individ.Prenume, masina.Firma
        FROM individ RIGHT JOIN masina ON individ.Individ_ID = masina.Individ_ID
        WHERE masina.Firma = '$id'";
$result = $conn->query($sql);

    while($row = mysqli_fetch_array($result))
    {
        echo "Nume : ". $row['Nume'] ," ----- Prenume : ". $row['Prenume']," ----- Firma masina : ". $row['Firma'];
        echo "<br>";
    }
}

// 2. Toate masinile pe care le are individul cu numele:
if(isset($_GET['obtine1']) && !empty($_GET['Nume']))
{

$id1 = $_GET['Nume'];
echo "<br>";
//echo "Firma si Modelul masinii a individului cu numele: ";
echo "<br>";
echo "<br>";

$sql1 = "SELECT masina.Firma, masina.Model, individ.Nume
         FROM masina INNER JOIN individ ON masina.Individ_ID = individ.Individ_ID
         WHERE individ.Nume = '$id1'";
$result1 = $conn->query($sql1);
    while($row = mysqli_fetch_array($result1))
    {
        echo "Firma: ". $row['Firma'] ," ----- Model: ". $row['Model'], " ----- Nume : ". $row['Nume'] ;
        echo "<br>";
    }
}  

// 3. Angajatii din judetul:
if(isset($_GET['obtine2']) && !empty($_GET['Judet']))
{

$id2 = $_GET['Judet'];
echo "<br>";
//echo "Nume si Prenume indivizi care fac parte din judetul: ";
echo "<br>";
echo "<br>";

$sql2 = "SELECT individ.Nume, individ.Prenume 
         FROM individ INNER JOIN domiciliu ON 
         individ.Domiciliu_ID = domiciliu.Domiciliu_ID 
         WHERE domiciliu.Judet = '$id2'";
$result2 = $conn->query($sql2);

    while($row = mysqli_fetch_array($result2))
    {
        echo "Nume : ". $row['Nume'] ," ----- Prenume : ". $row['Prenume'] ;
        echo "<br>";
          
    }
}

  
$conn->close();
?>


<html>

    <head>
        <title> Cautare date personale indivizi </title>
        
        <link rel="stylesheet"href="style.css" media="all" />
    </head>
    
<body>
   
    <div class="main_wrapper">
        
      
        <div class="content_wrapper">

        <form method="GET">
            Nume si Prenume indivizi care au masina cu firma: <input type="text" name="Firma" >
            <input type="submit" name="obtine" value="GET">
        </form>
            
        <form method="GET">
            Firma si Modelul masinii a individului cu numele: <input type="text" name="Nume" >
            <input type="submit" name="obtine1" value="GET">
        </form>

        <form method="GET">
            Nume si Prenume indivizi care fac parte din judetul: <input type="text" name="Judet" >
            <input type="submit" name="obtine2" value="GET">
        </form>

        </div>
        
        </div>
    
    </div>

  <a href="page.php">Back</a>
</body>

</html>