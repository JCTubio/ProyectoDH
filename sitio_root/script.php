<?php
//include ('conn.php');

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
		$sql="INSERT INTO juandb (nombre, correo, contrasenia, avatar) VALUES ($usuario['nombre'], $usuario['correo'], $usuario['contrasenia'], $usuario['avatar'])";
		$query=$db->prepare($sql);
		$query->execute();
}

$db=null;
