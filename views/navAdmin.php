<nav class="navbar navbar-default">
<div class="container-fluid">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand white" href="#">Librerias Shakespeare</a>
  </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="#">Mi perfil</a></li>
      <li><a href="#">Pedidos</a></li>
      <li><a href="#">Artículos</a></li>
      <li><a href="login.php">Categorías</a></li>
      <li><a href="users.php">Usuarios</a></li>
      <li><a href="#">Bitácora</a></li>
      <li><?php echo '<a style= "color:#6399D9;" >'."Hola! ".$_SESSION["nickname"].'</a>'; ?></li>
      <li><a href="models/cerrarsesion.php">Cerrar sesión</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
