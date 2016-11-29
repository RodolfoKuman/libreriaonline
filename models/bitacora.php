<?php

function tableBitacora($datos){
  $codigo = '<div class="container  espaciado">';
	$codigo .= '<div class="row table-responsive">';
	$codigo .= '<table id="" class="table table-bordered  table-striped " id="" >';

  $codigo .='<th>Id</th>';
	$codigo .='<th>Usuario</th>';
  $codigo .='<th>Operacion</th>';
  $codigo .='<th>Nombre</th>';
	$codigo .='<th>Editorial</th>';
	$codigo .='<th>Precio</th>';
  $codigo .='<th>Nuevo nombre</th>';
  $codigo .='<th>Nuevo editorial</th>';
  $codigo .='<th>Nuevo precio</th>';
  $codigo .='<th>Fecha</th>';


	while($fila = @mysqli_fetch_array($datos)){

		$codigo .='<tr>';
    $codigo .= '<td>'.utf8_encode($fila["id"]).'</td>';
		$codigo .= '<td>'.utf8_encode($fila["usuario"]).'</td>';
    $codigo .= '<td>'.utf8_encode($fila["operacion"]).'</td>';
    $codigo .= '<td>'.utf8_encode($fila["nombre"]).'</td>';
		$codigo .= '<td>'.utf8_encode($fila["editorial"]).'</td>';
		$codigo .= '<td>'.utf8_encode($fila["precio"]).'</td>';
		$codigo .= '<td>'.utf8_encode($fila["nuevo_nombre"]).'</td>';
    $codigo .= '<td>'.utf8_encode($fila["nuevo_editorial"]).'</td>';
    $codigo .= '<td>'.utf8_encode($fila["nuevo_precio"]).'</td>';
    $codigo .= '<td>'.utf8_encode($fila["fecha"]).'</td>';

		$codigo .='</tr>';

	}

	$codigo .= '</table>';
	$codigo .= '</div>';
	$codigo .= '</div>';

	return $codigo;

}


?>
