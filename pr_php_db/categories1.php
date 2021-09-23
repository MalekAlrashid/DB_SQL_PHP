
<html>
 <head>
  <title>MR CATEGORIES</title>
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
        <div class= "menu">
            <ul> 
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Produkte</a></li>
                <li><a href="">Mitarbeiter</a></li>
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
include_once("conn.php");

$sql = "SELECT * FROM categories";
$db_erg = mysqli_query( $conn, $sql );

echo '<table>
        <tr>
            <th>  ID   </th>
            <th> Kategorie Name </th>
            <th> Beschreibung</th>
        </tr>';

while ($row = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC))
    {
     echo '<tr>';
     echo '<td>'.$row['CategoryID'].'</td>';
     echo '<td>'.$row['CategoryName'].'</td>';   
     echo '<td>'.$row['Description'].'</td>';
     echo '<td><a href="add.html">Bearbeiten</a> </td>';
    }

 echo '</table>';

mysqli_free_result( $db_erg );

?>


</header>

</body>
</html>