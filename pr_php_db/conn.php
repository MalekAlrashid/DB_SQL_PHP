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
?>