<?php
session_start();
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Comprar ahora</title>
	<link rel="stylesheet" href="css/bootstrap.css" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material-fullpalette.min.css">
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
  <h2>Detalles del pedido</h2>
  <?php
  include('models/datos.php');
  $nombreTabla = 'carrito'.$_SESSION["id"];

  $query = "SELECT * FROM $nombreTabla";
  $query2 = "SELECT SUM(precio) as sum FROM $nombreTabla";

  $con = mysqli_connect($host,$user,$password,$base);
  $result2=mysqli_query($con,$query2);
  $row= mysqli_fetch_array($result2);

  if($result=mysqli_query($con,$query)){
    $codigo =  '<span class="glyphicon glyphicon-tag" aria-hidden="true">Articulos</span>';
    $codigo .= '<div class=" table-responsive">';
    $codigo .= '<table style="color:black;" class="table">';
    $codigo .='<th>Descripcion</th>';
    $codigo .='<th>Precio</th>';
    while($fila = @mysqli_fetch_array($result)){

      $codigo .='<tr>';
      $codigo .='<td>'.$fila["nombre"].'</td>';
      $codigo .='<td>'.$fila["precio"].'</td>';
      $codigo .='</tr>';

    }
    $codigo .= '</table>';
    $codigo .= '</div>';
    $codigo.='<h3 id="total" data-total='.$row["sum"].'  style="color:green;">Total: $'.$row["sum"].'</h3>';
    $codigo.='<a href="buyBook.php">Regresar a la lista de libros</a>';

    echo $codigo;
  }else{
    echo "<p>No ha agregado productos<p>";
  }
  ?>
</div>

<div class="container">
  <h3>Completar información de entrega</h3>
  <form id="purchase">
  <div class="form-group">
    <label for="">Direccion</label>
    <input name="direccion" id="direccion" type="text" class="form-control" placeholder="direccion de facturación(#Edificio, casa -  región - Estado)">
  </div>
  <div class="form-group">
    <label for="">Teléfono</label>
    <input name="telefono" id="telefono" type="number" class="form-control" placeholder="telefono" required="true">
    <input name="usuario" id="usuario" data-user=<?php echo $id; ?> type="hidden" class="form-control" placeholder="telefono" required="true">
    <input name="nombreTabla" id="nombreTabla" data-tabla=<?php echo $nombreTabla; ?> type="hidden" class="form-control" placeholder="">
  </div>
  <div class="form-group">
    <select name="pago" id="pago"  class="form-control">
  <option value="">Seleccionar forma de pago</option>
  <option  value="credito">Credito</option>
  <option  value="debito">Debito</option>
  <option  value="efectivo">Efectivo</option>
</select>
  </div>
  <h4>Se efectuará el cobro al momento de entregarle sus productos</h4>
  <button id="btn-comprar" type="submit" class="btn btn-success">Comprar</button>
</form>
<div class="infoFactura">
	<p><a target="_blank" href="lib/reportes/facturas.php ">Imprimir factura</a></p>
</div>

</div>


<?php include('views/footer.php'); ?>

</body>
</html>
