<?php
include ('conn.php');
exit;
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
		//$sql = "INSERT INTO usuarios (nombre, correo, contrasenia, avatar) VALUES ($usuario['nombre'], $usuario['correo'], $usuario['contrasenia'], $usuario['avatar'])";
        $stmt = $db->prepare("INSERT INTO usuarios (nombre, correo, contrasenia, avatar) VALUES (:nombre, :correo, :contrasenia, :avatar)");
        $stmt->bindParam(':nombre', $usuario['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':correo', $usuario['correo'], PDO::PARAM_STR);
        $stmt->bindParam(':contrasenia', $usuario['contrasenia'], PDO::PARAM_STR);
        $stmt->bindParam(':avatar', $usuario['avatar'], PDO::PARAM_STR);
		$stmt->execute();
}

$db=null;
