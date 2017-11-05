<?php
require_once ('/clases/DBMySQL.php');

//crear tabla de ususarios
$stmt = $db->prepare("CREATE TABLE usuarios (id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT, nombre VARCHAR(200) NOT NULL, correo VARCHAR(200) NOT NULL, contrasenia VARCHAR(200) NOT NULL, avatar VARCHAR(200) NOT NULL)");
$stmt->execute();
$stmt=null;



function getUsers ($pathDB)
{
	$usuarios = [];
	if (file_exists($pathDB)) {
		$json = file_get_contents($pathDB);
		$usuarios = json_decode($json, true);
	}
	return $usuarios;
}


$usuarios = getUsers ('usuarios.json');
// ahora ya tengo todos los usuarios en un array asociativo

//var_dump($usuarios);


foreach ($usuarios as $usuario){
		    $stmt = $db->prepare("INSERT INTO usuarios (nombre, correo, contrasenia, avatar) VALUES (:nombre, :correo, :contrasenia, :avatar)");
        $stmt->bindParam(':nombre', $usuario['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':correo', $usuario['correo'], PDO::PARAM_STR);
        $stmt->bindParam(':contrasenia', $usuario['contrasenia'], PDO::PARAM_STR);
        $stmt->bindParam(':avatar', $usuario['avatar'], PDO::PARAM_STR);
		$stmt->execute();
}

$db=null;
