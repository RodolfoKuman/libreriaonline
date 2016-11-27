<?php

include('datos.php');


  $nombreTabla = $_POST['nombreTabla'];

  $query = "SELECT * FROM $nombreTabla";
  $query2 = "SELECT SUM(precio) as sum FROM $nombreTabla";

  $con = mysqli_connect($host,$user,$password,$base);
  $result2=mysqli_query($con,$query2);
  $row= mysqli_fetch_array($result2);

  if($result=mysqli_query($con,$query)){
    $codigo ='<span class="glyphicon glyphicon-tags" aria-hidden="true">Mi bolsa</span>';
    $codigo .= '<div class=" table-responsive">';
    $codigo .= '<table id="tablaCarrito"  class="table   " >';
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
    $codigo.='<h3>Total: $'.$row["sum"].'</h3>';
    $codigo.='<button class="btn btn-primary">Realizar pedido</button>';
    echo $codigo;
  }else{
    echo "error";
  }



?>
