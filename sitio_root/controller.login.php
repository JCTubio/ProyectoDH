<?php
session_start();

include ('conn.php');
require 'helpers.php';


//OBSOLETO JSON
//define('DB_PATH', 'usuarios.json');

$errores = [];

//Validación


$user = getUserByEmailsql($_POST['correo']);

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
