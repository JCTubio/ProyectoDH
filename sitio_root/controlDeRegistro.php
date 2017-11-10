<?php
session_start();

include_once("soporte.php");
require_once("clases/usuario.php");
include ('helpers.php');

/*if ($auth->estaLogueado()) {
	header("Location:index.php");exit;
}*/





$errores = [];
if ($_POST) {
	$errores = $validador->validarInformacion($_POST, $db);

	if (!isset($errores["nombre"])) {
		$nombreDefault = $_POST["nombre"];
	}

	if (!isset($errores["correo"])) {
		$correoDefault = $_POST["correo"];
	}

	/*if (!isset($errores["username"])) {
		$usernameDefault = $_POST["username"];
	}

	if (!isset($error["telefono"])) {
		$telefonoDefault = $_POST["telefono"];
	}*/

	if (count($errores) == 0) {
		$usuario = new Usuario($_POST);
		$correo = $_POST["correo"];

		//$usuario->guardarImagen($correo);
		$db->guardarUsuario($usuario);

		header('Location: index.php');
		//header("Location:perfilUsuario.php?mail=$mail");exit;
	}
}


//OBSOLETO JSON
//define('DB_PATH', 'usuarios.json');

/*$errores = [];

//Validación de los datos ingresados por el usuario
$nombre = trim($_POST['nombre']);
if (empty($nombre)) {
	$errores['nombre'] = 'El nombre es obligatorio';
}

$correo = trim($_POST['correo']);
if (empty($correo)) {
	$errores['correo'] = 'El email es obligatorio';
} elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
	$errores['correo'] = 'El email ingresado no es válido';
}

$contrasenia = trim($_POST['contrasenia']);
if (empty($contrasenia)) {
	$errores['contrasenia'] = 'El password es obligatorio';
}

$controlContrasenia = trim($_POST['controlContrasenia']);
/*if (empty($controlContrasenia)) {
	$errores['controlContrasenia'] = 'La verificación del password es obligatoria';
}*/
/*
if ($contrasenia !== $controlContrasenia){
	$errores['verificarContrasenia'] = 'Los Password ingresados no coinciden';
}


if (getUserByEmailsql($_POST["correo"], $db)) {
	$errores['correo'] = 'El email ya existe en la base';
}

if ($errores) {
	$_SESSION['errores'] = $errores;
	$_SESSION['inputsValues'] = $_POST;
	header('Location: registro.php');
	exit;
}

//Crear Imagen




//Crear usuario
$datosUsuario = [
	'nombre' => $nombre,
	'correo' => $correo,
	'contrasenia' => password_hash($contrasenia, PASSWORD_DEFAULT),
	];

$usuario = new Usuario($datosUsuario);

//nueva carga por Mysql
$stmt = $db->prepare("INSERT INTO usuarios (nombre, correo, contrasenia, avatar) VALUES (:nombre, :correo, :contrasenia, :avatar)");
$stmt->bindParam(':nombre', $usuario->getNombre(), PDO::PARAM_STR);
$stmt->bindParam(':correo', $usuario->getCorreo(), PDO::PARAM_STR);
$stmt->bindParam(':contrasenia', $usuario->getContrasenia(), PDO::PARAM_STR);
$stmt->bindParam(':avatar', $usuario->getAvatar(), PDO::PARAM_STR);
$stmt->execute();

$db=null;

//Recuperar data -OBSOLETO JSON-
//$usuarios = getUsers(DB_PATH);

//Guardar usuario -OBSOLETO JSON-
//$usuarios[] = $usuario;
//$json = json_encode($usuarios);
//file_put_contents(DB_PATH, $json);

*/



$_SESSION['usuariologueado']=$usuario;
header('Location: index.php');
