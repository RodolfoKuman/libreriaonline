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
<script src="js/cotizacion.js"></script>
</head>

<body>
<?php include('views/navAdmin.php'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-6 bookAvailable">
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
        $nombreTabla = "carrito".$_SESSION['id'];

        $query= "CREATE   TABLE $nombreTabla(nombre varchar(50),precio double(8,2)) ";
        if(mysqli_query($con,$query)){
         echo  "se creo la tabla temporal";
        }else{
          echo "la tabla ya existe".@mysqli_error($con);
        }

				 echo "<input id='nombreTabla' type='hidden' value='$nombreTabla' />"
			 ?>
    </div>
		<div class=" col-md-4 col-md-offset-1 ">
			<div class="miBolsa">
				<?
				$query = "SELECT * FROM $nombreTabla";
				$query2 = "SELECT SUM(precio) as sum FROM $nombreTabla";

				$con = mysqli_connect($host,$user,$password,$base);
				$result2=mysqli_query($con,$query2);
				$row= mysqli_fetch_array($result2);

				if($result=mysqli_query($con,$query)){
					$codigo =  '<span class="glyphicon glyphicon-tag" aria-hidden="true">Articulos</span>';
					$codigo .= '<div class=" table-responsive">';
					$codigo .= '<table id="tablaCarrito"  class="table   " >';
					$codigo .='<th>Descripcion</th>';
					$codigo .='<th>Precio</th>';
					while($fila = @mysqli_fetch_array($result)){

						$codigo .='<tr>';
						$codigo .='<td>'.$fila["nombre"].'</td>';
						$codigo .='<td>'.$fila["precio"].'</td>';
					//	$codigo .='<td><a class="btn btn-primary"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>'; //insertar un campo id a la tabla para eliminarlo cuan do se presione el boton
						$codigo .='</tr>';

					}
					$codigo .= '</table>';
					$codigo .= '</div>';
					$codigo.='<h3>Total: $'.$row["sum"].'</h3>';
					$codigo.='<button class="btn btn-primary">Realizar pedido</button>';
					echo $codigo;
				}else{
					echo "<p>No ha agregado productos<p>";
				}
				?>
			</div>
		</div>

	</div>
</div>

<?php include('views/footer.php'); ?>

</body>
</html>
