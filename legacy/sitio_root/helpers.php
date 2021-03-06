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

function getUsersSql ()
{
	$stmt = $db->prepare("SELECT * FROM usuarios");
	/*$stmt->bindParam(':correo', $correo, PDO::PARAM_STR);*/
	$stmt->execute();
	$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$db=null;
	return $resultados;


	/*$usuarios = [];
	if (file_exists($pathDB)) {
		$json = file_get_contents($pathDB);
		$usuarios = json_decode($json, true);
	}
	return $usuarios;*/
}


function getUserByEmail ($correo, $pathDB)
{
	$usuarios = getUsersSql($pathDB);
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

function overrideUserSql ($correo)
{
    for ($i = 0; $i < count($array_usuarios); $i++){
        if($array_usuarios[$i]['correo'] == $correo){
            unset($array_usuarios[$i]);
            break;
        }
    }
}


function getUSerByEmailsql ($correo, $db){
	$stmt = $db->prepare("SELECT * FROM usuarios WHERE correo like :correo");
	$stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
	$stmt->execute();
	$resultados = $stmt->fetch(PDO::FETCH_ASSOC);
	$db=null;
	return $resultados;
}
