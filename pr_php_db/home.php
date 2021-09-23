<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="home.css">
    <link href="js.php">
    
    <!--<link rel="stylesheet" href="index.css"> -->
</head>
<body>
<?php
    $datum = date("d.m.Y");
    $uhrzeit = date("H:i");

    # connection to mrdb Database
    include_once('conn.php'); # $conn ist die variable der Verbindung

    # Datein abholen aus der Tabelle customers 
    $sql = "SELECT * FROM customers";
    $result = mysqli_query($conn, $sql);
    if($result) {
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    # all variable culomn
    $id     ='';
    $customerid     ='';
    $name   = '';
    $contnm = '';
    $address = '';
    $city    = '';
    $postal  = '';
    $country = '';

    # Nachrichten
    $messages = array(
        'add' => 'Neuer Kunde wurde erfolgreich hinzugefügt',
        'del' => 'Kunde wurde erfolgreich gelöscht',
        'edit' => 'Neue Daten wurden aktualisiert',
    );

    if (isset($_POST['id'])){
        $id = $_POST['id'];
    }

    if (isset($_POST['customerid'])){
        $customerid = $_POST['customerid'];
    }
    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }
    if(isset($_POST['contnm'])){
        $contnm = $_POST['contnm'];
    }
    if(isset($_POST['address'])){
        $address = $_POST['address'];
    }
    if(isset($_POST['city'])){
        $city= $_POST['city'];
    }
    if(isset($_POST['postal'])){
        $postal = $_POST['postal'];   
    }
    if(isset($_POST['country'])){
        $country= $_POST['country'];
    }

    if(isset($_GET['message'])) {
        echo("<script>console.log('" . $messages[$_GET['message']] . "' );</script>");
    }

    # neu Werte in die Tabbele einfügen durch butten add
    $add = '';

    if(isset($_POST['add'])){ # add ist der Name von butten Fügen
        $add = "INSERT INTO customers (CustomerID, CustomerName, ContactName, Address, City, PostalCode, Country) VALUES ($customerid, '$name', '$contnm',
        '$address', '$city', '$postal', '$country' )";
        mysqli_query($conn, $add);
        header("location: home.php?message=add"); # refresh    
    }
    # Werte löschen mit butten del ist der Name von Löschen
    $del = '';

    if(isset($_POST['del'])){
        $del= "DELETE FROM customers WHERE id = '$id'";
        mysqli_query($conn, $del);
        #header("location: home.php?message=del"); # refresh
    }

    # Werte aktualisieren Edit UPDATE 
    $edit= '';

    if(isset($_POST['edit'])){
        /**
         * nur die felder übermitteln, die auch gefüllt sind
         */
        $edit = ("UPDATE customers SET 
        CustomerID ='$customerid', CustomerName = '$name'  , ContactName ='$contnm', Address = '$address',
        City = '$city' , PostalCode = '$postal', Country =' $country' 
        WHERE id = '$id' ");
        mysqli_query($conn, $edit);
        header('location: home.php?message=edit');
        #($id = CustomerID, '$name' = CustomerName, '$contnm' = ContactName,
        #'$address' = Address, '$city' = City, '$postal' = PostalCode, '$country' = Country WHERE CustomerName = '$name')
    }


        /**
         * ids an select feld übergeben
         */
?>    
    <div id='mother'>
        <form method="POST" action="">
            <aside> <!-- Daten des neuen Kunde-->
                <div id='div'>
                        <a target="_blank" href="Screenshot.png">
                            <img src="Screenshot.png" alt="logo" style="width:90%">
                        </a>
                    <!--<img src="Screenshot.png" alt="logo" width="100%" id='img'>-->
                    <h4> Kontrollbereich</h4>
                    <label> ID:</label><br>
                    <select name="id" id='id'>
                        <?php
                        foreach($result as $row => $values) {
                            echo "<option value='" . $values['id'] . "'>" . $values['id'] . "</option>";
                        }
                        ?>
                    </select><br>
                    <label> Kunde ID:</label><br>
                    <input type="text" name="customerid" id='customerid'><br>
                    <label> Name des Kundes : </label><br>
                    <input type="text" name="name" id='name'><br>
                    <label> Kuntaktame des Kundes : </label><br>
                    <input type="text" name="contnm" id = 'contnm'><br>
                    <label> Adresse des Kundes : </label><br>
                    <input type="text" name="address" id = 'address'><br>
                    <label> Stadt des Kundes : </label><br>
                    <input type="text" name="city" id = 'city'><br>
                    <label> Postleizahl des Kundes : </label><br>
                    <input type="text" name="postal" id= 'postal'><br>
                    <label> Land des Kundes : </label><br>
                    <input type="text" name="country" id = 'country'><br><br>
                    <button name= 'add' id='add'>    Fügen</button>
                    <button name = 'del'id = 'del'>  Löschen</button><br>
                    <button name = 'edit' id='edit'> Aktolaisieren</button><br>
                </div>
            </aside>
            <main>
            <div id='header'>
                        <div id= 'ab'><?php echo $uhrzeit," Uhr";?> </div>
                        <div id='bc'><?php echo 'Date: '.$datum;?> </div>
                    </div> <!-- Anzeige -->
            <div><h4>Aktuelle Tabelle</h4></div>
            <table id= 'tpl'>
            <tr>
            <th>  ID     </th>
            <th>  Kundennummer     </th>
            <th>  Name   </th>
            <th>  Kontaktname  </th>
            <th>  Adresse </th>
            <th>  Stadt </th>
            <th>  Postleizah </th>
            <th>  Land  </th>
            </tr>
            <?php # Struktur der Tabelle
                        foreach($result as $row => $values) {
                            echo "<tr>";
                            echo "<td>".$values['id']. "</td>";
                            echo "<td>".$values['CustomerID'].     "</td>";
                            echo "<td>".$values['CustomerName'].   "</td>";
                            echo "<td>".$values['ContactName'].    "</td>";
                            echo "<td>".$values['Address'].        "</td>";
                            echo "<td>".$values['City'].           "</td>";
                            echo "<td>".$values['PostalCode'].     "</td>";
                            echo "<td>".$values['Country'].        "</td>";
                            echo "</tr>";
                        }
            ?>

            </table>

            </main>
        </form>
        
    </div>
    <script>
        // delete
        document.getElementById('del').onclick = function(){
            confirm('Bist du sicher, willst die  Daten löschen ? ');

        }
        // add
        document.getElementById('add').onclick = function(){
            alert('Die Daten wurden erfolgreich gefügt + '); 
        }    
        //edit
        document.getElementById('edit').onclick = function(){
            alert('Die Daten wurden erfolgreich aktualisiert - ');
        }
    </script>
</body>
</html>