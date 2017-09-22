<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Reseteo de Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/formulario.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <!--<link rel="stylesheet" href="css/global.css">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
      <div class="container">
        <?php include("header.php"); ?>

        <div class="contenido">
            <div class="col-md-8">
              <h1>Reseteo de Password</h1>
            </div>
            <form action="index.html" method="get">
                <div class="form-group col-md-8">
                    <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo Electrónico" required>
                </div>
                <div class="form-group col-md-8">
                    <button type="submit">Enviar</button>
                </div>
                <div class="form-group col-md-8">
                  <a href="login.php">Volver al Login</a>
                </div>
            </form>
        </div>  <!--cierra contenido-->
        <?php include("footer.php"); ?>
      </div>  <!--cierra container-->

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
