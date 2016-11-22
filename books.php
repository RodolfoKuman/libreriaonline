<?php
session_start();
if($_SESSION["type"] == "administrador" || $_SESSION["type"] == "ejecutivo" ) {
  $user=$_SESSION["nombre"];
}

else {
  header('Location: ../index.html');
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
  <title>Libros</title>
</head>
<script   src="js/jquery.js"  ></script>
<script src="js/bootstrap.min.js" ></script>
<script src="js/bookController.js" ></script>
<body>

<?php include('views/navAdmin.php'); ?>

<!-- Formulario de inicio de sesion -->
  <div class="container ">
    <div id="books" >

    <div class="contenedor2">
      <form  action="models/addBook.php"  method="POST" enctype="multipart/form-data"  class=" style-4 clearfix ">
        <div class="">
          <label for="">Nombre</label>
          <input type="text" required name="nombre" id="nombre">
          <span class="help-block"></span>
        </div>
        <div class="">
          <label for="">Editorial</label>
          <input type="text" name="editorial" id="editorial" required>
          <span class="help-block"></span>
        </div>
        <div class="">
          <label for="">Descripción</label>
          <input type="text" name="descripcion" id="descripcion" placeholder="" required="true">
          <span class="help-block"></span>
        </div>
        <div class="">
          <label for="">Categoria</label>
          <input type="text" name="categoria" id="categoria" placeholder="" required="true">
          <span class="help-block"></span>
        </div>
        <div class="">
          <label for="">Precio</label>
          <input type="number" name="precio" id="precio" placeholder="$0.0" required="true">
          <span class="help-block"></span>
        </div>
        <div class=" ">
        <input style="width:200px;"  type="file" name="imagen" id="imagen"  role="button"/>
      </div><br>
        <div class="">
          <button  id="boton"  class="btn btn-primary">Agregar</button>
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
      include("models/libros.php");
  			// Usamos esas variables
  			if($con = conectarBase($host,$user,$password,$base)){
  				//Operaciones
  				$consulta = "SELECT * FROM libros ORDER BY fecha_alta DESC";
  				if($paquete = consultar($con,$consulta)){
  					$codigoMenu = tableBooks($paquete);
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
