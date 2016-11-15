<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Liberias shakepeare | Registrate</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/formularios.css">

<script src="js/jquery.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validacionUsers.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
            $("span.help-block").hide();
            $("#boton").click(function(){

								validaTexto("nombre");
								validaTexto("apellido");
                validaMail("email");
                validaContra("password");
                validaContra("repass");
								validaUser("user");

                if( !validaMail("email") || !validaContra("password") || !validaContra("repass") || !validaUser("user") || !validaTexto("nombre") || !validaTexto("apellido")){
            return false; // No envia el formulario
        }
    });
				$("#user").keyup(function(){validaUser("user")});
        $("#email").blur(function(){Ccorreo()});
        $("#repass").keyup(function(){repass()});
        $("#password").keyup(function(){validaContra("password")});
        $("#repass").blur(function(){validaContra("repass")});
				$("#nombre").blur(function(){validaTexto("nombre")});
				$("#apellido").blur(function(){validaTexto("apellido")});



	  });//fin ready
    </script>
		<script src="js/validacionUsers.js"></script>
</head>
<body>

	<?php include ('views/navPrincipal.php'); ?>


	<div id="register">
		<h4 class="text-red">Registrate para obtener grandes beneficios</h4>
		<form  action="registerUser.php" method="POST" class=" style-4 clearfix ">
			<div class="">
				<label for="">Nombre</label>
				<input type="text" required="true" name="nombre" id="nombre">
				<span class="help-block"></span>
			</div>
			<div class="">
				<label for="">Apellido</label>
				<input type="text" name="apellido" id="apellido" required>
				<span class="help-block"></span>
			</div>
			<div class="">
				<label for="">Nombre de usuario</label>
				<input type="text" name="user" id="user" placeholder="Mínimo 8 carácteres" required="true">
				<span class="help-block"></span>
			</div>
			<div class="">
				<label for="">Email</label>
				<input type="email" name="email" id="email" placeholder="example@gmail.com" required="true">
				<span class="help-block"></span>
			</div>
			<div class="">
				<label for="" >Contraseña</label>
				<input type="password" name="password" id="password" placeholder="Mínimo 6 carácteres" required="true">
				<span class="help-block"></span>
			</div>
			<div class="">
				<label for="">Repetir contraseña</label>
				<input type="password" name="repass" id="repass" placeholder="repetir contraseña" required="true">
				<span class="help-block" ></span>
			</div>
			<div class="">
				<button id="boton" class="btn btn-primary">Aceptar</button>
				<a href="login.php">Ya tengo una cuenta</a>
			</div>
		</form>
	</div>


	<?php include('views/footer.php'); ?>
	</body>
</html>
