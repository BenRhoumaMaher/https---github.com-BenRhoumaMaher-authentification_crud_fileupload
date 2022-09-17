<?php

$db_host = 'localhost';
$db_name = 'crudalpha';
$db_user = 'root';
$db_password = '';

$dbc = "mysql:host = $db_host; dbname = $db_name; charset = UTF8";
try {
    $dba = new PDO($dbc,$db_user,$db_password);
    $dba -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e) {
    die($e ->getMessage());
}



