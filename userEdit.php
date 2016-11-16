<?php
  session_start();
  if($_SESSION["type"] != "administrador"){
    header('Location: index.html');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/formularios.css">
  <link rel="stylesheet" href="css/font-awesome.css">
  <title>Home</title>
</head>
<script   src="js/jquery.js"  ></script>
<script src="js/bootstrap.min.js" ></script>
<script src="js/validacionUsers.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
            $("span.help-block").hide();
            $("#botonActualizar").click(function(){

								validaTexto("nombre");
								validaTexto("apellido");
                validaMail("email");
								validaUser("user");

                if( !validaUser("user") || !validaTexto("nombre") || !validaTexto("apellido")){
            return false; // No envia el formulario
        }
    });
				$("#user").keyup(function(){validaUser("user")});
				$("#nombre").blur(function(){validaTexto("nombre")});
				$("#apellido").blur(function(){validaTexto("apellido")});



	  });//fin ready
    </script>
    <script src="js/userController.js"></script>
<body>


<?php include('views/navAdmin.php'); ?>

<!-- Formulario de inicio de sesion -->
  <div class="container ">



  <?php
  		include("models/datos.php");
  		require("models/funciones.php");
      include("models/usuarios.php");
      if(isset($_GET["codigo"]) and $_GET["codigo"] <> ""){

				$codigo = $_GET["codigo"];

					if( $con = conectarBase($host, $user, $password, $base)){

						$consulta = "SELECT * FROM usuarios WHERE id='$codigo'";

						if($paquete = consultar($con, $consulta)){

							$resultado = editUser($paquete);
							echo  $resultado;

						}else{
							echo "<p> No se encontraron datos </p>";
						}

					}else{
						echo "<p> Servicio interrumpido</p>";
					}

			}else{
				echo "<p> No se ha indicado que registro desea modificar </p>";
			}


  	?>

    </div>



<?php include('views/footer.php'); ?>


</body>
</html>
