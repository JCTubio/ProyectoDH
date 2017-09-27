<header>
      <div class="login-header">
        <?php if (!empty($_SESSION['usuariologueado'])): ?>
          <div class="login-logout">
            <a href="logout.php">Logout</a>
            <p> | </p>
            <a href="index.php">Bienvenido
            <?php echo $_SESSION['usuariologueado']['nombre'] ?>
            </a> <!--Aca iria php buscando el nombre de usuario*/-->
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
        <div class="mobile-toggle">
          <p> <i class="fa fa-bars " aria-hidden="true"></i> </p>
        </div>
        <div class="logo-container">
          <a href="index.php"><img src="images/audi.png" class="logo" alt="brand-logo"></a>
        </div>
        <div class="benefits-container">
          <div class="benefits-description">
            <i class="fa fa-truck" aria-hidden="true"></i>
            <p class="envios">Envios a todo<br> el país</p>
            <i class="fa fa-credit-card" aria-hidden="true"></i>
            <p class="cuotas">Hasta 12 cuotas<br>
            sin interés
            </p>
          </div>
        </div>
        <div class="customer-specific">
          <p class="welcome">bienvenido!</p>
          <p class="adress-card"><i class="fa fa-address-card-o" aria-hidden="true"></i>
          </p>
          <p class="cart-total">$0,00</p>
          <p class="cart-icon"><i class="fa fa-shopping-cart"></i></p>
        </div>
      </div>
      <div class="lower-header">
        <form class="search-container">
          <input class="search-field" type="text" name="header-search" value="" placeholder="Qué estás buscando?">
          <button type="search-button" name="button"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </header>
