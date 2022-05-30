<?php
// Variabeln deklarieren
$host = 'localhost'; // host
$username = 'root'; // username
$password = 'root'; // password
$database = 'binary'; // database



// mit der Datenbank verbinden
$mysqli = new mysqli($host, $username, $password, $database);



// Fehlermeldung, falls Verbindung fehl schlägt.
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
}
?>