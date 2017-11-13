<header>
      <div class="login-header">
        <?php if (!empty($_SESSION['usuariologueado'])): ?>
          <div class="login-logout">
            <a href="logout.php">Logout</a>
            <p> | </p>
            <a href="perfil.php">Bienvenido
            <?php echo $_SESSION['usuariologueado']['nombre'] ?>
            </a>
          </div>
          <?php endif; ?>
          <?php if(empty($_SESSION['usuariologueado'])): ?>
            <div class="login-logout">
            <a href="registro.php">Register</a>
            <p> | </p>
            <a href="login.php">Log in</a>
            </div>
          <?php endif; ?>
      </div>
      <div class="upper-header">
        <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
        <a href="index.php"><img src="images/audi.png" class="logo" alt="brand-logo"></a>
        <i class="fa fa-truck" aria-hidden="true"></i>
        <p class="cart-total">$0,00</p>
        <i class="fa fa-shopping-cart fa-2x"></i>
        <img src="images/img-zapatilla3.jpg" alt="" class="avatar">
        <p class="welcome">Nombre de usuario</p>
      </div>
      <div class="lower-header">
        <form class="search-container">
          <input class="search-field" type="text" name="header-search" value="" placeholder="Qué estás buscando?">
          <button type="search-button" name="button"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </header>
