
<html>
 <head>
  <title>MR ABSENDER</title>
  <link rel="stylesheet" href="index.css">
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

$sql = "SELECT * FROM shippers";
$db_erg = mysqli_query( $conn, $sql );

echo '<table>
        <tr>
            <th> Absender ID   </th>
            <th> Absender Name </th>
            <th> Telefone </th>
        </tr>';

while ($row = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC))
    {
     echo '<tr>';
     echo '<td>'.$row['ShipperID'].'</td>';
     echo '<td>'.$row['ShipperName'].'</td>';   
     echo '<td>'.$row['Phone'].'</td>';
     echo '<td><a href="up_shipper.html">Bearbeiten</a> </td>';
    }

 echo '</table>';

mysqli_free_result( $db_erg );

?>


</header>

</body>
</html>