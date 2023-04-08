<?php

//database host
$db_host = "localhost";
//database username
$db_user = "root";
//database password
$db_pass = "";
//database name
$db_name = "personal_diary";

try {
    //create PDO connection 
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch (PDOException $e) {
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}
