
<html>
 <head>
  <title>MR PRODUKTE</title>
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

$sql = "SELECT * FROM products";
$db_erg = mysqli_query( $conn, $sql );

echo '<table>
        <tr>
            <th> ID  </th>
            <th> Name </th>
            <th> Anbieter / Lieferant ID </th>
            <th> Kategorie ID </th>
            <th> Einheit</th>
            <th> Preis </th>
        </tr>';

while ($row = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC))
    {
     echo '<tr>';
     echo '<td>'.$row['ProductID'].'</td>';
     echo '<td>'.$row['ProductName'].'</td>';   
     echo '<td>'.$row['SupplierID'].'</td>';
     echo '<td>'.$row['CategoryID'].'</td>';
     echo '<td>'.$row['Unit'].'</td>';
     echo '<td>'.$row['Price'].'</td>';
     echo '<td><a href="add.html?ProductID=' . $row['ProductID'] . '">Bearbeiten</a> </td>';
    }

 echo '</table>';

mysqli_free_result( $db_erg );

?>

</header>

</body>
</html>