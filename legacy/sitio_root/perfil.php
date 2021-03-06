<?php
/**
 * Created by PhpStorm.
 * User: ShadowPlay
 * Date: 9/28/2017
 * Time: 6:51 PM
 */
session_start();
$nombre = $_SESSION['usuariologueado']['nombre'] ?? 'Nombre y Apellido';
$correo = $_SESSION['usuariologueado']['correo'] ?? 'email';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/perfil.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <!--<link rel="stylesheet" href="../css/global.css">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <div class="container">
      <?php if (!empty($_SESSION['errores'])): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <?php foreach ($_SESSION['errores'] as $value): ?>
                    <p><?php echo $value; ?></p>
                <?php endforeach ?>
            </div>
        </div>
    </div>
<?php endif ?>
<div class="contenido">
    <div class="col-md-8">
        <h1>Complete el formulario para actualizar los datos de su usuario</h1>
    </div>
    <form action="perfil.controller.php" enctype="multipart/form-data" method="post">

        <div class="form-group col-md-8">
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder=" <?php echo $nombre ?>"required>
        </div>
        <div class="form-group col-md-8">
            <input type="email" class="form-control" name="correo" id="correo" placeholder="<?php echo $correo ?>"required>
        </div>
        <div class="form-group col-md-8">
            <input type="password" class="form-control" name="vieja_contrasenia" id="vieja_contrasenia" placeholder="Password actual"required>
        </div>
        <div class="form-group col-md-8">
            <input type="password" class="form-control" name="contrasenia" id="contrasenia" placeholder="Nueva password (puede ser igual a la actual)"required>
        </div>
        <div class="form-group col-md-8">
            <input type="password" class="form-control" name="controlContrasenia" id="controlContrasenia" placeholder="Confirmar nueva password"required>
        </div>
        <div class="form-group col-md-8">
            <select class="form-control" name="pais" required>
                <option value="">País de Residencia</option>
                <option value="argentina">Argentina</option>
                <option value="brasil">Brasil</option>
                <option value="uruguay">Uruguay</option>
                <option value="paraguay">Paraguay</option>
                <option value="chile">Chile</option>
                <option value="peru">Perú</option>
            </select>
        </div>
        <div class="form-group col-md-8">
            <label for="avatar">Avatar: </label><br/>
            <input type="file" class="form-control" name="avatar" id="avatar" value=""required>
        </div>
        <div class="form-group col-md-8">
            <button type="submit">Actualizar mis datos personales</button>
        </div>
        <div class="form-group col-md-8">
            <button type="reset">Cancelar</button>
        </div>
    </form>
</div> <!-- cierra contenido -->
<?php include("footer.php"); ?>
</div>  <!-- cierra container -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>