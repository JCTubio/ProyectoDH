<?php
session_start();

require 'helpers.php';

define('DB_PATH', 'sitio_root/usuarios.json');

$errores = [];

//Validación



$user = getUserByEmail($_POST['correo'], 'usuarios.json');

if ($user == false) {
	$errores['email'] = 'El usuario ingresado no existe';
} else {
	if (password_verify($_POST['contrasenia'], $user['contrasenia']) == false) {
		$errores[] = 'contraseña incorrecta';
	}
}






if ($errores) {
	$_SESSION['errores'] = $errores;
	$_SESSION['inputsValues'] = $_POST;
	header('Location: login.php');
	exit;
}

$_SESSION['usuariologueado'] = $user;



header('Location: index.php');
