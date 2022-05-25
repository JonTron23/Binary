<?php
// Variabeln deklarieren
$host = 'ht25n.myd.infomaniak.com'; // host
$username = 'ht25n_admin'; // username
$password = 'M-cd9ZxkoN1'; // password
$database = 'ht25n_binary'; // database



// mit der Datenbank verbinden
$mysqli = new mysqli($host, $username, $password, $database);



// Fehlermeldung, falls Verbindung fehl schlägt.
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
}
?>