<?php
require_once("db.php");
class Auth {

  public function __construct() {
    session_start();

  	if (!isset($_SESSION["usuariologueado"]) && isset($_COOKIE["usuariologueado"])) {
  		$_SESSION["usuariologueado"] = $_COOKIE["usuariologueado"];
  	}
  }

  public function loguear($_POST['correo']) {
    $_SESSION["usuariologueado"] = $_POST['correo'];
  }

  public function estaLogueado() {
    return isset($_SESSION["usuariologueado"]);
  }

  public function usuarioLogueado(DB $db) {
    if ($this->estaLogueado()) {
      $mail = $_SESSION["usuariologueado"];
      return $db->traerPorMail($mail);
    } else {
      return NULL;
    }
  }

  public function recordame($_POST['correo']) {
    setcookie("logueado", $_POST['correo'], time() + 3600 * 2);
  }

  public function logout() {
    session_destroy();
		setcookie("logueado", "", -1);
  }
}


?>
