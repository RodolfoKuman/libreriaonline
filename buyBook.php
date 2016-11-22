<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Comprar ahora</title>
	<link rel="stylesheet" href="css/bootstrap.css" >
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/dashboardAdmin.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="js/jquery.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>

<body>
<?php include('views/navAdmin.php'); ?>

<div class="contenedor">
  <div class="row">
    <div class="col-md-6">
      <h2>Libros disponibles</h2>

      <?php
      include('models/datos.php');
      include('models/funciones.php');
      include('models/libros.php');

      if($con = conectarBase($host,$user,$password,$base)){
        //Operaciones
        $consulta = "SELECT * FROM libros ORDER BY categoria DESC";
        if($paquete = consultar($con,$consulta)){
          $codigoMenu = listBooks($paquete);
          echo $codigoMenu;
        }else{
          echo "<p>No se encontraron datos";
        }
      }else{
        echo "<p>Servicio interrumpido</p>";
      }

      ?>
    </div>
  </div>

</div>

<?php include('views/footer.php'); ?>

</body>
</html>
