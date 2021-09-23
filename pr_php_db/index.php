<html>
 <head>
  <title>MR DATABASE HOME</title>
  <link rel="stylesheet" href="index.css">
  <link  href="index.js">
 </head>
<body>
    <div class="title">
     <h3>DATENBANKEN Beispiel</h3>
     
    </div>

<?php   include_once("conn.php");   ?>

<header>
     <div class = "header">
        <!-- NAVI -->
        <div >
            <ul class= "menu"> 
                <li><a href="index.php">    Home</a></li>
                <li><a href="">             Shopping</a></li>
                <li><a href="">             Kontakt</a></li>
                <li><a href="">             Über uns</a></li>
              </ul>
        </div>
        <!-- Tabellen -->
        <div>
            <ul class="data">

                <li><a href="products1.php">       Produkte       </a></li>
                <li><a href="customers1.php">      Kunden         </a></li>
                <li><a href="employees1.php">      Mitarbeiter    </a></li>
                <li><a href="shippers1.php">       Absender       </a></li>
                <li><a href="suppliers.php">       Lieferanten    </a></li>
                <li><a href="categories1.php">     Categorien     </a></li>
                <li><a href="orderdetails1.php">   Aufträge Deteil</a></li>
                <li><a href="order1.php">          Aufträge       </a></li>
                

              </ul>
        </div>

    </div>
<?php
