<?php

require_once("db.php");


abstract class Validador {
  public abstract function validarInformacion($informacion, DB $db) {
    $errores = [];

<<<<<<< HEAD


    $nombre = trim($informacion['nombre']);
    if (empty($nombre)) {
    	$errores['nombre'] = 'El nombre es obligatorio';
    }

    $correo = trim($informacion['correo']);
    if (empty($correo)) {
    	$errores['correo'] = 'El email es obligatorio';
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    	$errores['correo'] = 'El email ingresado no es válido';
    }

    $contrasenia = $informacion['contrasenia'];
    if (empty($contrasenia)) {
    	$errores['contrasenia'] = 'El password es obligatorio';
    }

    $controlContrasenia = $informacion['contrasenia'];
    if (empty($controlContrasenia)) {
    	$errores['controlContrasenia'] = 'La verificación del password es obligatoria';
    }

    if ($contrasenia !== $controlContrasenia){
    	$errores['verificarContrasenia'] = 'Los Password ingresados no coinciden';
    }

    
    if ($db->traerPorMail($informacion['correo'])) {
    	$errores['correo'] = 'El email ya existe en la base';
    }

    if ($errores) {
    	$_SESSION['errores'] = $errores;
    	$_SESSION['inputsValues'] = $_POST;
    	header('Location: registro.php');
    	exit;
    }







=======
		foreach ($_POST as $clave => $valor) {
			$informacion[$clave] = trim($valor);
		}


		if (strlen($_POST["nombre"]) <= 3) {
			$errores["nombre"] = "Tenes que poner más de 3 caracteres en tu nombre de usuario";
		}

		// if ($informacion["edad"] < 18) {
		// 	$errores["edad"] = "Tenes que tener más de 18 años";
		// }

		// if (is_numeric($informacion["telefono"]) == false) {
		// 	$errores["telefono"] = "El telefono debe ser un numero";
		// }


		if ($_POST["correo"] == "") {
			$errores["correo"] = "Che, dejaste el mail incompleto";
		}
		else if (filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL) == false) {
			$errores["correo"] = "El mail tiene que ser un mail";
		} else if ($db->traerPorMail($_POST["email"]) != NULL) {
			$errores["correo"] = "El usuario ya existia!";
		}

		if ($_POST["contrasenia"] == "") {
			$errores["contrasenia"] = "No llenaste la contraseña";
		}

		if ($_POST["controlContrasenia"] == "") {
			$errores["controlContrasenia"] = "No llenaste completar contraseña";
		}

		if ($_POST["contrasenia"] != "" && $_POST["controlContrasenia"] != "" && $_POST["contrasenia"] != $_POST["controlContrasenia"]) {
			$errores["contrasenia"] = "Las contraseñas no coinciden";
		}
>>>>>>> dc9a5b4b654acff87c2962d4714c9fd6c5294446

    if ($_FILES["avatar"]["error"] != UPLOAD_ERR_OK)
		{
      $errores["avatar"] = "Hubo un error al cargar la imagen";
    } else {
      $nombre=$_FILES["avatar"]["name"];

			$ext = pathinfo($nombre, PATHINFO_EXTENSION);

			if ($ext != "jpg" && $ext != "png" && $ext != "jpeg") {
				$errores["avatar"] = "La imagen no tiene el formato adecuado";
			}
    }


		return $errores;

    // agregar validacion de país de residencia.
  }

  public abstract function validarLogin($informacion, DB $db) {
    $errores = [];

		foreach ($_POST as $clave => $valor) {
			$_POST[$clave] = trim($valor);
		}


		if ($_POST["correo"] == "") {
			$errores["correo"] = "Che, dejaste el mail incompleto";
		}
		else if (filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL) == false) {
			$errores["correo"] = "El mail tiene que ser un mail";
		} else if ($db->traerPorMail($_POST["correo"]) == NULL) {
			$errores["mail"] = "El usuario no esta en nuestra base";
		}

		$usuario = $db->traerPorMail($_POST["correo"]);

		if ($_POST["contrasenia"] == "") {
			$errores["contrasenia"] = "No llenaste la contraseña";
		} else if ($usuario != NULL) {
			//El usuario existe y puso contraseña
			// Tengo que validar que la contraseño que ingreso sea valida
			if (password_verify($_POST["contrasenia"], $usuario->getPassword()) == false) {
				$errores["contrasenia"] = "La contraseña no verifica";
			}
		}




		return $errores;
  }
}

 ?>
