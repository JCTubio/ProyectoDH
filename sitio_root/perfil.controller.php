<?php
/**
 * Created by PhpStorm.
 * User: ShadowPlay
 * Date: 9/28/2017
 * Time: 7:02 PM
 */

session_start();

require 'helpers.php';

define('DB_PATH', 'usuarios.json');

$errores = [];

$user = $_SESSION['usuariologueado'];
$user['contrasenia'] = password_get_info($user['contrasenia']);

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

$vieja_contrasenia = ($_POST['vieja_contrasenia']);
if (empty($vieja_contrasenia)) {
    $errores['contrasenia'] = 'La vieja password es obligatoria';
}
if ($vieja_contrasenia != $user['contrasenia']){
    $errores['contrasenia'] = 'La password introducida no coincide con la anterior';
}

$contrasenia = ($_POST['contrasenia']);
if (empty($contrasenia)) {
    $errores['contrasenia'] = 'La nueva password es obligatoria';
}

$controlContrasenia = ($_POST['controlContrasenia']);
if ($contrasenia !== $controlContrasenia){
    $errores['verificarContrasenia'] = 'Los Password ingresados no coinciden';
}

if ($errores) {
    $_SESSION['errores'] = $errores;
    $_SESSION['inputsValues'] = $_POST;
    header('Location: perfil.php');
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

//Recuperar data
$usuarios = getUsers(DB_PATH);

//Sobreescribir usuario
overrideUser($usuarios, $_POST['correo']);
$usuarios[] = $usuario;
$json = json_encode($usuarios);
file_put_contents(DB_PATH, $json);

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