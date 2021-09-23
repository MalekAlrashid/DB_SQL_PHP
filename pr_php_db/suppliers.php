
<html>
 <head>
  <title>MR LIFERANTE</title>
  <link rel="stylesheet" href="index.css">
  <link  href="index.js">
 </head>
<body>
<div class="title">
     <h3>DATENBANKEN Beispiel</h3>
    </div>

<header>

    <div class = "header">
    <!-- NAVI -->
        <div >
            <ul class= "menu"> 
                <li><a href="index.php">Home</a></li>
                <li><a href="">Shopping</a></li>
                <li><a href="">Kontakt</a></li>
                <li><a href="">Über uns</a></li>
              </ul>
        </div>

    </div>
<?php

#<!-- mit localhost server verbinden-->
$servername = "localhost";
$user = "root";
$password = "";
$dbname = "mrdb";

$conn = new mysqli($servername, $user, $password, $dbname);

#<!--verbindung überprüfen-->
if($conn->connect_error){
die("Fehler mit der Verbindung!!!".$conn->connect_error);
}

echo 
"<div display='none'>
    <script type='text/javascript'>
        console.log('Ist mit localhost verbunden');
    </script>
</div>";


?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mrdb";   

require_once ('suppliers.php');
$db_link = mysqli_connect (
  $servername, 
  $username, 
  $password, 
  $dbname
  );

$sql = "SELECT * FROM suppliers";
$db_erg = mysqli_query( $db_link, $sql );
if ( ! $db_erg )
{
  die('Ungültige Abfrage: ' . mysqli_error($conn));
}
echo '<table><tr><th>Lieferant ID</th><th>Lieferant Name </th><th>Kontakt Name</th><th>Adresse</th><th>Stadt</th><th>Postleizahl</th><th>Land</th><th>Telefon</th>';
while ($zeile = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC))
{ 
  echo "<tr>";
  echo "<td >". $zeile['SupplierID'] . "</td>";
  echo "<td>". $zeile['SupplierName'] . "</td>";
  echo "<td>". $zeile['ContactName'] . "</td>";
  echo "<td>". $zeile['Address'] . "</td>";
  echo "<td>". $zeile['City'] . "</td>";
  echo "<td>". $zeile['PostalCode'] . "</td>";
  echo "<td>". $zeile['Country'] . "</td>";
  echo "<td>". $zeile['Phone'] . "</td>";
  echo "</tr>";
}
echo "</table>";

mysqli_free_result( $db_erg );
?>


</header>

</body>
</html>