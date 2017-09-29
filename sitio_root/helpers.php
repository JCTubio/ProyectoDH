<?php

function getUsers ($pathDB)
{
	$usuarios = [];
	if (file_exists($pathDB)) {
		$json = file_get_contents($pathDB);
		$usuarios = json_decode($json, true);
	}
	return $usuarios;
}

function getUserByEmail ($correo, $pathDB)
{
	$usuarios = getUsers($pathDB);
	$usuario = false;
	for($i=0;$i<count($usuarios); $i++){
		if($usuarios[$i]['correo'] == $correo){
			$usuario = $usuarios[$i];
			break;
		}
	}
	return $usuario;
}

function overrideUser ($array_usuarios, $correo)
{
    for ($i = 0; $i < count($array_usuarios); $i++){
        if($array_usuarios[$i]['correo'] == $correo){
            unset($array_usuarios[$i]);
            break;
        }
    }
}
