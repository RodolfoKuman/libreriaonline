<?php

include('datos.php');



  $nombreTabla = $_POST['nombreTabla'];
  $query = "SELECT * FROM $nombreTabla";
  $query2 = "SELECT SUM(precio) as sum FROM $nombreTabla";

  $con = mysqli_connect($host,$user,$password,$base);
  $result2=mysqli_query($con,$query2);
  $row= mysqli_fetch_array($result2);

  if($result=mysqli_query($con,$query)){
    $codigo =  '<span class="glyphicon glyphicon-tag" aria-hidden="true">Articulos</span>';
    $codigo .= '<div class=" table-responsive">';
    $codigo .= '<table style="color:black;" id="tablaCarrito"  class="table   " >';
    $codigo .='<th>Descripcion</th>';
    $codigo .='<th>Precio</th>';
    while($fila = mysqli_fetch_array($result)){

      $codigo .='<tr id="'.$fila["id"].'">';
      $codigo .='<td>'.$fila["nombre"].'</td>';
      $codigo .='<td>'.$fila["precio"].'</td>';
      $codigo .='<td><button data-id="'.$fila["id"].'" class="btn btn-warning deleteItem"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>'; //insertar un campo id a la tabla para eliminarlo cuan do se presione el boton
      $codigo .='</tr>';

    }
    $codigo .= '</table>';
    $codigo .= '</div>';
    $codigo.='<h3>Total: $'.$row["sum"].'</h3>';
    $codigo.='<button   class="btn btn-success confirmarPedido">Realizar pedido</button>';
    echo $codigo;

  }else{
    echo "<p>No ha agregado productos<p>";
  }
?>
