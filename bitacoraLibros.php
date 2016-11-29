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
  <title>Bitácora</title>
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

  <div class="container">
    <h2>Bitacora de la tabla libros</h2>
  </div>

  <?php
  		include("models/datos.php");
  		require("models/funciones.php");
      include("models/bitacora.php");
  			// Usamos esas variables
  			if($con = conectarBase($host,$user,$password,$base)){
  				//Operaciones
  				$consulta = "SELECT * FROM bitacora_libros ORDER BY fecha DESC";
  				if($paquete = consultar($con,$consulta)){
  					$codigoMenu = tableBitacora($paquete);
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
