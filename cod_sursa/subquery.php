
// interogari complexe
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "politie";
  
$conn = new mysqli($servername, $username, $password, $dbname);

// 1.
if(isset($_GET['obtine']) && !empty($_GET['Data']))
{

$id = $_GET['Data'];
//echo "Firma si modelul masinii al caror proprietar(individ) are cazier emis dupa data introdusa:";
echo "<br>";
echo "<br>";                  

$sql = "SELECT masina.Firma, masina.Model
        FROM masina 
        WHERE masina.Individ_ID IN (SELECT individ.Individ_ID FROM individ, cazier
                                    WHERE individ.Individ_ID = cazier.Individ_ID 
                                    AND cazier.Data > '$id')";

$result = $conn->query($sql);

    while($row = mysqli_fetch_array($result))
    {
        echo "Firma : ". $row['Firma'], " ----- Model : ". $row['Model'] ;
        echo "<br>";
          
    }
}

// 2.
if(isset($_GET['obtine1']) && !empty($_GET['Firma']))
{

$id1=$_GET['Firma'];
//echo "Nume si prenume individ care nu are masini cu firma masinii data de utilizator: ";
echo "<br>";
echo "<br>";                  

$sql1 = "SELECT individ.Nume, individ.Prenume
        FROM individ 
        WHERE individ.Individ_ID NOT IN (SELECT masina.Individ_ID FROM individ, masina
                                    WHERE individ.Individ_ID = masina.Individ_ID 
                                    AND masina.Firma = '$id1')";

$result1 = $conn->query($sql1);

    while($row = mysqli_fetch_array($result1))
    {
        echo "Nume : ". $row['Nume'] ," ----- Prenume : ". $row['Prenume'];
        echo "<br>";
          
    }
}

// 3. 
if(isset($_GET['obtine2']) && !empty($_GET['Ora']))
{

$id2 = $_GET['Ora'];
//echo "Firma si modelul masinii unde proprietarul are cazier emis inainte de ora specificata:";
echo "<br>";
echo "<br>";                  

$sql2 = "SELECT masina.Firma, masina.Model
        FROM masina 
        WHERE EXISTS (SELECT individ.Individ_ID FROM individ, cazier
                                    WHERE individ.Individ_ID = cazier.Individ_ID 
                                    AND cazier.Ora < '$id2')";

$result2 = $conn->query($sql2);

    while($row = mysqli_fetch_array($result2))
    {
        echo "Firma : ". $row['Firma'], " ----- Model : ". $row['Model'] ;
        echo "<br>";
          
    }
}

// 4. 
if(isset($_GET['obtine3']) && !empty($_GET['Localitate']))
{

$id3 = $_GET['Localitate'];
//echo "Nume si prenume indivizi care sunt mai tineri decat toti indivizii din localitatea: ";
echo "<br>";
echo "<br>";                  

$sql3 = "SELECT individ.Nume, individ.Prenume
        FROM individ 
        WHERE individ.DataNasterii > ALL(SELECT individ.DataNasterii FROM individ, domiciliu
                                      WHERE individ.Domiciliu_ID = domiciliu.Domiciliu_ID
                                      AND domiciliu.Localitate = '$id3')";

$result3 = $conn->query($sql3);
    while($row = mysqli_fetch_array($result3))
    {
        echo " Nume : ". $row['Nume'] ," ----- Prenume : ". $row['Prenume'];
        echo "<br>";
          
    }

}

  
$conn->close();
?>

<html>

    <head>
        <title> Cautare particulara indivizi </title>
        
        <link rel="stylesheet"href="style.css" media="all" />
    </head>
    
<body>
  
    <div class="main_wrapper">
        
        <div class="content_wrapper">

        <form method="GET">
            Firma si modelul masinii al caror proprietar(individ) are cazier emis dupa data: <input type="text" name="Data" >
            <input type="submit" name="obtine" value="GET">
        </form>
            
        <form method="GET">
            Nume si prenume individ care nu are masini cu firma masinii: <input type="text" name="Firma" >
            <input type="submit" name="obtine1" value="GET">
        </form>

        <form method="GET">
            Firma si modelul masinii unde proprietarul are cazier emis inainte de ora: <input type="text" name="Ora" >
            <input type="submit" name="obtine2" value="GET">
        </form> 
        <form method="GET">
            Nume si prenume indivizi care sunt mai tineri decat toti indivizii din localitatea: <input type="text" name="Localitate" >
            <input type="submit" name="obtine3" value="GET">
        </form>

        </div>
        
        </div>
    
    </div>

  <a href="page.php">Back</a>
</body>

</html>