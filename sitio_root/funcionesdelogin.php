<?php
session_start()
// obtengo los usuarios de la DB y los meto en un Array

function getUsers ($pathDB) {
if (file_exists($pathDB)) {
  $json = file_get_contents ($pathDB);
  $usuarios = json_decode ($json, true); //Acá armo el array de usuarios
}
return $usuarios
}

function getUserByEmail ($email, $pathDB) {
  $errorLogin = [];
  $usuarios = getUsers ($pathDB);
  $user = false;
  for ($i = 0, $i < count ($usuarios); $i++) {
    if ($usuarios[$i]['correo'] == $email){
      $user = $usuarios[$i];
      break;
  }
  return $user;
}



 ?>
