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
    $nombreImagen = uniqid();
		$miArchivo = "avatar_usuarios/" . $nombreImagen . "." . $ext;

		move_uploaded_file($archivo, $miArchivo);
    $this->avatar = $nombreImagen;
  }

  public function setCorreo($correo) {
    $this->correo = $correo;
  }

  public function getCorreo() {
    return $this->correo;
  }

  public function setContrasenia($contrasenia) {
    $this->contrasenia = $contrasenia;
  }

  public function getContrasenia() {
    return $this->contrasenia;
  }
  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  public function getNombre() {
    return $this->nombre;
  }
  public function getAvatar() {
    return $this->avatar;
  }
}

?>
