<?php

class Usuario {
  private $nombre;
  private $correo;
  private $contrasenia;
  private $avatar;


  public function __construct($datos)
  {
    $this->nombre = $datos['nombre'];
    $this->correo = $datos['correo'];
    $this->contrasenia = $datos['contrasenia'];
    $this->guardarImagen();

  }

  public function guardarImagen() {
		$nombre=$_FILES["avatar"]["name"];
		$archivo=$_FILES["avatar"]["tmp_name"];

		$ext = pathinfo($nombre, PATHINFO_EXTENSION);

		$miArchivo = "img/" . $this->getEmail() . "." . $ext;

		move_uploaded_file($archivo, $miArchivo);
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPais($pais) {
    $this->pais = $pais;
  }

  public function getPais() {
    return $this->pais;
  }

  public function setEdad($edad) {
    $this->edad = $edad;
  }

  public function getEdad() {
    return $this->edad;
  }

  public function setUsername($username) {
    $this->username = $username;
  }

  public function getUsername() {
    return $this->username;
  }


}

?>
