<?php
  session_start();
  if($_SESSION["type"] != "administrador" ) {
    header('Location: index.html');
  }else if($_SESSION["id"]== 0){
	  header('Location: index.html');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.css" >
  <link rel="stylesheet" href="css/font-awesome.min.css" >
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/formularios.css">
  <link rel="stylesheet" href="css/dashboardAdmin.css">
  <title>Usuarios</title>
</head>
<script   src="js/jquery.js"  ></script>
<script src="js/bootstrap.min.js" ></script>
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
    <script src="js/userController.js"></script>
<body>

<?php include('views/navAdmin.php'); ?>

<!-- Formulario de inicio de sesion -->
  <div class="container ">
    <div class="users">

    <div id="register">
      <form  action=""  method="POST" onsubmit="addUser()" class=" style-4 clearfix ">
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
          <label for="">Tipo</label>
          <select class="type" name="type" id="type">
            <option value="administrador">administrador</option>
            <option value="cliente">cliente</option>
            <option value="ejecutivo">ejecutivo</option>
          </select>

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
          <button id="boton" onkeypress="addUser()"  onclick="addUser()" class="btn btn-primary">Agregar</button>
        </div>
      </form>
    </div>

    </div>
  </div>

  <div class="container mensaje">

  </div>

  <?php
  		include("models/datos.php");
  		require("models/funciones.php");
      include("models/usuarios.php");
  			// Usamos esas variables
  			if($con = conectarBase($host,$user,$password,$base)){
  				//Operaciones
  				$consulta = "SELECT * FROM usuarios ORDER BY fecha_alta DESC";
  				if($paquete = consultar($con,$consulta)){
  					$codigoMenu = tableUsers($paquete);
  					echo $codigoMenu;
  				}else{
  					echo "<p>No se encontraron datos";
  				}
  			}else{
  				echo "<p>Servicio interrumpido</p>";
  			}
  	?>


<!--  Footer   -->

<?php include('views/footer.php'); ?>

</body>
</html>
