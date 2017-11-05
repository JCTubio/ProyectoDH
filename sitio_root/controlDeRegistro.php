<?php
session_start();

include ('conn.php');
include ('helpers.php');

//OBSOLETO JSON
//define('DB_PATH', 'usuarios.json');

$errores = [];

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
$imageName = uniqid();
$nombreCompleto = guardarImagen('avatar', $imageName, 'avatar_usuarios/');

//Crear usuario
$usuario = [
	'nombre' => $nombre,
	'correo' => $correo,
	'contrasenia' => password_hash($contrasenia, PASSWORD_DEFAULT),
	'avatar' => $nombreCompleto
];

//nueva carga por Mysql
$stmt = $db->prepare("INSERT INTO usuarios (nombre, correo, contrasenia, avatar) VALUES (:nombre, :correo, :contrasenia, :avatar)");
$stmt->bindParam(':nombre', $usuario['nombre'], PDO::PARAM_STR);
$stmt->bindParam(':correo', $usuario['correo'], PDO::PARAM_STR);
$stmt->bindParam(':contrasenia', $usuario['contrasenia'], PDO::PARAM_STR);
$stmt->bindParam(':avatar', $usuario['avatar'], PDO::PARAM_STR);
$stmt->execute();

$db=null;

//Recuperar data -OBSOLETO JSON-
//$usuarios = getUsers(DB_PATH);

//Guardar usuario -OBSOLETO JSON-
//$usuarios[] = $usuario;
//$json = json_encode($usuarios);
//file_put_contents(DB_PATH, $json);

function guardarImagen($inputName, $imageName, $path)
{
	if ($_FILES[$inputName]['error'] == UPLOAD_ERR_OK) {
		$ext = pathinfo($_FILES[$inputName]['name'], PATHINFO_EXTENSION);
		move_uploaded_file(
			$_FILES[$inputName]['tmp_name'],
			$path.$imageName.'.'.$ext
		);
		return $imageName.'.'.$ext;
	}
}
$_SESSION['usuariologueado']=$usuario;
header('Location: index.php');
