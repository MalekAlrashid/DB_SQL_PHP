
<html>
 <head>
  <title>MR AUFTRÄGE</title>
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
include_once("conn.php");

$sql = "SELECT * FROM orders";
$db_erg = mysqli_query( $conn, $sql );

echo '<table>
        <tr>
            <th> Auftrag ID  </th>
            <th> Kunden ID </th>
            <th> Mitarbeiter ID </th>
            <th> Auftragsdatum </th>
            <th> Absender ID</th>
        </tr>';

while ($row = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC))
    {
     echo '<tr>';
     echo '<td>'.$row['OrderID'].'</td>';
     echo '<td>'.$row['CustomerID'].'</td>';   
     echo '<td>'.$row['EmployeeID'].'</td>';
     echo '<td>'.$row['OrderDate'].'</td>';
     echo '<td>'.$row['ShipperID'].'</td>';
     echo '<td><a href="add.html">Bearbeiten</a> </td>';
    }

 echo '</table>';

mysqli_free_result( $db_erg );

?>


</header>

</body>
</html>