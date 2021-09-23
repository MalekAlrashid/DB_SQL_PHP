<html>
 <head>
  <title>MR KUNDEN</title>
  <link rel="stylesheet" href="index.css">
  <link  href="index.js">
 </head>
<body>
<div class="title">
     <h3>DATENBANKEN Beispiel</h3>
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
      

  
<?php
include_once("conn.php");

$sql = "SELECT * FROM customers";
$db_erg = mysqli_query( $conn, $sql );

echo '<table>
        <tr>
            <th> Kunden ID  </th>
            <th> Kunden Name </th>
            <th> Kontakt Name </th>
            <th> Adresse </th>
            <th> Stadt </th>
            <th> Postleizah </th>
            <th> Land</th>
        </tr>';

while ($row = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC))
    {
     echo '<tr>';
     echo '<td>'.$row['CustomerID'].'</td>';
     echo '<td>'.$row['CustomerName'].'</td>';   
     echo '<td>'.$row['ContactName'].'</td>';
     echo '<td>'.$row['Address'].'</td>';
     echo '<td>'.$row['City'].'</td>';
     echo '<td>'.$row['PostalCode'].'</td>';
     echo '<td>'.$row['Country'].'</td>';
     echo '<td><a href="add.html">Bearbeiten</a> </td>';
    }

 echo '</table>';

mysqli_free_result( $db_erg );

?>

</header>

</body>
</html>
