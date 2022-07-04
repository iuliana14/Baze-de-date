
// urmatoarele 3 interogari simple
<DOCTYPE!>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "politie";
  
$conn = new mysqli($servername, $username, $password, $dbname);

// 4.Indivizii cu mai mult de o masina si sexul...
if(isset($_GET['obtine3']) && !empty($_GET['Sex']))
{

$id3 = $_GET['Sex'];
echo "<br>";
//echo "Nume si Prenume indivizi care au mai mult de o masina si au sexul dat de utilizator: ";
echo "<br>";
echo "<br>";

$sql3 = "SELECT individ.Nume, individ.Prenume
		 FROM individ INNER JOIN masina ON 
         individ.Individ_ID = masina.Individ_ID
         WHERE individ.Sex = '$id3'
         GROUP BY individ.Nume, individ.Prenume
         HAVING COUNT(masina.Masina_ID) > 1";

$result3 = $conn->query($sql3);

	while($row = mysqli_fetch_array($result3))
	{
	    echo "Nume : ". $row['Nume'] ," ----- Prenume : ". $row['Prenume'] ;
	    echo "<br>";
	      
	}
} 

// 5.Indivizii cu cazierul emis dupa ora specificata
if(isset($_GET['obtine4']) && !empty($_GET['Ora']))
{

$id4 = $_GET['Ora'];
echo "<br>";
//echo "Nume si Prenume indivizi care au cazierul emis dupa ora data de utilizator: ";
echo "<br>";
echo "<br>";

$sql4 = "SELECT individ.Nume, individ.Prenume 
		 FROM individ INNER JOIN cazier ON 
         individ.Individ_ID = cazier.Individ_ID 
         WHERE cazier.Ora > '$id4'";

$result4 = $conn->query($sql4);

	while($row = mysqli_fetch_array($result4))
	{
	    echo "Nume : ". $row['Nume'] ," ----- Prenume : ". $row['Prenume'] ;
	    echo "<br>";
	      
	}
}

// 6.Indivizii cu cazierul emis inainte de data ...
if(isset($_GET['obtine5']) && !empty($_GET['Data']))
{

$id5 = $_GET['Data'];
echo "<br>";
//echo "Nume si Prenume indivizi care au cazierul emis inainte de data scrisa de utilizator: ";
echo "<br>";
echo "<br>";

$sql5 = "SELECT individ.Nume, individ.Prenume from individ INNER JOIN cazier ON 
         individ.Individ_ID = cazier.Individ_ID 
         WHERE cazier.Data < '$id5'";

$result5 = $conn->query($sql5);

	while($row = mysqli_fetch_array($result5))
	{
	    echo "Nume : ". $row['Nume'] ," ----- Prenume : ". $row['Prenume'] ;
	    echo "<br>";
	      
	}
}

  
$conn->close();
?>

<html>

    <head>
        <title> Cautare date publice indivizi </title>
        
        <link rel="stylesheet"href="style.css" media="all" />
    </head>
    
<body>
    
    <div class="main_wrapper">
        
       
        <div class="content_wrapper">

        <form method="GET">
            Nume si Prenume indivizi care au mai mult de o masina si au sexul: <input type="text" name="Sex" >
            <input type="submit" name="obtine3" value="GET">
        </form>
        <form method="GET">
            Nume si Prenume indivizi care au cazierul emis dupa ora: <input type="text" name="Ora" >
            <input type="submit" name="obtine4" value="GET">
        </form>
        <form method="GET">
            Nume si Prenume indivizi care au cazierul emis inainte de data: <input type="text" name="Data" >
            <input type="submit" name="obtine5" value="GET">
        </form>

        </div> 
        
        </div>
    
    </div>


  <a href="page.php">Back</a>
</body>

</html>
