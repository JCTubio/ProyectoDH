<?php
session_start();
require 'funcionesdelogin.php';
define('DB_PATH', 'usuarios.json');
$errores = [];

getUserByEmail ($_POST['correo'], usuarios.json);

 ?>
