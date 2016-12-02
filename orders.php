<?php
session_start();
if($_SESSION["type"] == "administrador" || $_SESSION["type"] == "ejecutivo" ) {
  $user=$_SESSION["nombre"];
}
else{
  header('Location: ../index.html');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pedidos</title>
	<link rel="stylesheet" href="css/bootstrap.css" >

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/ripples.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/styleCompra.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="js/jquery.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/cotizacion.js"></script>
</head>

<body>
<?php include('views/navAdmin.php'); ?>

<div class="container">
  <h2>Pedidos</h2>
  <?php
  include('models/datos.php');

  $query = "SELECT * FROM pedidos ORDER BY fecha DESC";

  $con = mysqli_connect($host,$user,$password,$base);

  if($result=mysqli_query($con,$query)){

    $codigo = '<div class=" table-responsive">';
    $codigo .= '<table style="color:black;" class="table">';
    $codigo .='<th>Id</th>';
    $codigo .='<th>Fecha</th>';
    $codigo .='<th>Enviar a</th>';
    $codigo .='<th>Dirección</th>';
    $codigo .='<th>Teléfono</th>';
    $codigo .='<th>Total</th>';
    $codigo .='<th>Estatus</th>';
    while($fila = @mysqli_fetch_array($result)){

      $codigo .='<tr>';
      $codigo .='<td>'.$fila["id"].'</td>';
      $codigo .='<td>'.$fila["fecha"].'</td>';
      $codigo .='<td>'.$fila["destinatario"].'</td>';
      $codigo .='<td>'.$fila["direccion"].'</td>';
      $codigo .='<td>'.$fila["telefono"].'</td>';
      $codigo .='<td>'.$fila["total"].'</td>';
      $codigo .='<td><select name="pago" id="pago"  class="form-control">
                  <option value="">'.$fila["estatus"].'</option>
                  <option  value="credito">En camino</option>
                  <option  value="debito">Entregado</option>
                </select></td>';
      $codigo .='</tr>';

    }
    $codigo .= '</table>';
    $codigo .= '</div>';


    echo $codigo;
  }else{
    echo "<p>No hay pedidos<p>";
  }
  ?>
</div>


<?php include('views/footer.php'); ?>

</body>
</html>
