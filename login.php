<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Iniciar sesión</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/formularios.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="js/jquery.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validacionUsers.js"></script>
</head>
<body>
<?php include('views/navPrincipal.php'); ?>
<div id="login">
    <h3 class="centrar-texto spacing text-red">Iniciar sesión</h3>
    <form action=""  method="POST" onsubmit="login()" class="input-list style-4 clearfix">
      <div>
        <label for="">Email:</label>
        <input id="email" name="email" class="" type="email" placeholder="example@gmail.com">
        <span class="help-block"></span>
      </div>
      <div>
        <label for="">Contraseña:</label>
        <input id="password" name="password" class="campos" type="password" placeholder="Introduzca su contraseña">
         <span id="notificacion" name="notificacion" class="help-block"></span>
      </div>
     <div class="">
       <button name="boton" id="botonlogin" onkeypress="login();" onclick="login();" class="btn btn-primary" type="button" name="name" >Iniciar sesión</button>
       <a href="register.php">¿No tienes una cuenta?, registrate</a>
     </div>
    </form>
</div>

<?php include('views/footer.php'); ?>

</body>
</html>
