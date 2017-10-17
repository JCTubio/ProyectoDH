<?php

$dsn = 'mysql:host=localhost;dbname=web_db;charset=utf8mb4;port:3306';
$db_user = 'root';
$db_pass = '';

try{
    $db= new PDO($dsn, $db_user,$db_pass);
    echo "conexion exitosa";
}
catch(PDOException $Exception) {
   echo $Exception->getMessage();
}
