<?php

$host = "mysql-brayanloic.alwaysdata.net";
$dbname = "brayanloic_supercar";
$username = "338019";
$password = "#Brayan250#alwaysdata";

$mysqli = new mysqli($host, $username, $password, $dbname);
                                          
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;

?>