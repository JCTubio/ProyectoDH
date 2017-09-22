<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../material-de-soporte/custom_bs_home/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
		<title>Home</title>
  </head>
  <body>
    <div class="container">
      <?php include("php/header.php"); ?>
      <div class="header-pantalla-grande">
        <?php include("php/footer.php"); ?>
      </div>
      <!-- CARRUSEL-->

      <div class="separador"></div>

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img id="solo-chico" src="images/img-zapatilla1.jpg" alt="Converse 1" style="width:100%;">
            <img id="solo-grande" src="images/img-zapa-grande.jpg" alt="Converse 1" style="width:100%;">
            <div class="carousel-caption">
              <h3>Lorem</h3>
              <p>Ipsum lorem ipsum</p>
            </div>
          </div>

          <div class="item">
            <img id="solo-chico" src="images/img-zapatilla2.jpg" alt="Converse 2" style="width:100%;">
            <img id="solo-grande" src="images/img-zapa-grande2.jpg" alt="Converse 1" style="width:100%;">
            <div class="carousel-caption">
              <h3>Ipsum</h3>
              <p>Lorem lorem ipsum</p>
            </div>
          </div>

          <div class="item">
            <img id="solo-chico" src="images/img-zapatilla3.jpg" alt="Converse 3" style="width:100%;">
            <img id="solo-grande" src="images/img-zapa-grande3.jpg" alt="Converse 1" style="width:100%;">
            <div class="carousel-caption">
              <h3>Lorem Ipsum</h3>
              <p>Ipsum lorem ipsum</p>
            </div>
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <div class="separador">
        <h3>WOW SO LOREM</h3>
        <p>Get the new lorem. Now with double the ipsum!</p>
      </div>

      <?php include("php/footer.php"); ?>
    </div>
    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="../material-de-soporte/custom_bs_home/js/bootstrap.js"></script>
  </body>
</html>
