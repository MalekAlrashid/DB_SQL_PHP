
<html>
 <head>
  <title>MR AUFTRÄGE DETEILS</title>
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
include_once("conn.php");

$sql = "SELECT * FROM orderdetails";
$db_erg = mysqli_query( $conn, $sql );

echo '<table>
        <tr>
            <th>  ID  </th>
            <th> Auftrag ID </th>
            <th> Produkt ID </th>
            <th> Menge</th>
        </tr>';

while ($row = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC))
    {
     echo '<tr>';
     echo '<td>'.$row['OrderDetailID'].'</td>';
     echo '<td>'.$row['OrderID'].'</td>';   
     echo '<td>'.$row['ProductID'].'</td>';
     echo '<td>'.$row['Quantity'].'</td>';
     echo '<td><a href="add.html">Bearbeiten</a> </td>';
    }

 echo '</table>';

mysqli_free_result( $db_erg );

?>


</header>

</body>
</html>