<?php



function tableBooks($datos){
  $codigo = '<div class="container tableBook espaciado">';
	$codigo .= '<div class="row table-responsive">';
	$codigo .= '<table  class="table table-bordered  table-striped " id="tableBooks" >';

	$codigo .='<th>Nombre</th>';
  $codigo .='<th>Editorial</th>';
  $codigo .='<th>Descripcion</th>';
	$codigo .='<th>Categoria</th>';
	$codigo .='<th>Precio</th>';
  $codigo .='<th>Img</th>';
  $codigo .='<th>Fecha de alta</th>';
  $codigo .='<th>Última actualizacion</th>';
	$codigo .='<th class="centrar">Acción</th>';

	while($fila = @mysqli_fetch_array($datos)){

    $codigo .='<tr id="'.$fila["id"].'">';
		$codigo .= '<td>'.utf8_encode($fila["nombre"]).'</td>';
    $codigo .= '<td>'.utf8_encode($fila["editorial"]).'</td>';
    $codigo .= '<td>'.utf8_encode($fila["descripcion"]).'</td>';
		$codigo .= '<td>'.utf8_encode($fila["categoria"]).'</td>';
		$codigo .= '<td>'.utf8_encode($fila["precio"]).'</td>';
    $codigo .= '<td>'.'<img style="max-width:70px;" src="img/'.$fila["dir_img"].'"></td>';
		$codigo .= '<td>'.utf8_encode($fila["fecha_alta"]).'</td>';
    $codigo .= '<td>'.utf8_encode($fila["last_update"]).'</td>';


		$codigo .= '<td  class="centrar"><a    class="btn btn-danger deleteBook" data="'.$fila["id"].'" " ><span class="glyphicon glyphicon-trash " aria-hidden="true"></a>';
		$codigo .= '<a class="btn btn-primary margin-short" href="bookEdit.php?codigo='.$fila["id"].'"><span class="glyphicon glyphicon-edit " aria-hidden="true"></span></a></td>';

		$codigo .='</tr>';

	}

	$codigo .= '</table>';
	$codigo .= '</div>';
	$codigo .= '</div>';

	return $codigo;

}



function editBook($datos){

	if($fila = mysqli_fetch_array($datos)){

		$nombreActual = utf8_encode($fila["nombre"]);
    $editorialActual = utf8_encode($fila["editorial"]);
    $descripcionActual = utf8_encode($fila["descripcion"]);
		$categoriaActual = utf8_encode($fila["categoria"]);
		$precioActual = utf8_encode($fila["precio"]);

		$codigoActual = $fila["id"];

		$codigo = '<div class="contenedor ">

      <form id="actualizarBook" action=""  method="POST"  class=" style-4 clearfix ">
      <div class=" mensaje">

      </div>
      <h2>Editar libro <span style="color:#477DED;">'.$nombreActual.'</span> </h2>
        <div class="">
          <label for="">Nombre</label>
          <input type="text" required="true" name="nombre" id="nombre" value="'.$nombreActual.'">
          <span class="help-block"></span>
        </div>
        <div class="">
          <label for="">Editorial</label>
          <input type="text" name="editorial" id="editorial" required value="'.$editorialActual.'">
          <span class="help-block"></span>
        </div>
        <div class="">
          <label for="">Descripcion</label>
          <input type="text" name="descripcion" id="descripcion"  required="true" value="'.$descripcionActual.'">
          <span class="help-block"></span>
        </div>
        <div class="">
          <label for="">Categoria</label>
          <input type="text" name="categoria" id="categoria"  required="true" value="'.$categoriaActual.'">
          <span class="help-block"></span>
        </div>
        <div class="">
          <label for="">Precio</label>
          <input type="number" name="precio" id="precio"   value="'.$precioActual.'">
          <span class="help-block"></span>
        </div>
        <input type="hidden" id="codigo" name="codigo" value="'.$codigoActual.'">
        <div class="">
          <button style="margin-top:20px;"  class="btn btn-primary" id="">Actualizar</button>
        </div>
      </form>
      <p>Regresar al <a href="books.php">listado de libros</a></p>
    </div>';

	}else{

		$codigo = false;

	}

	return $codigo;

}


// funcion para listar libros para la venta

function listBooks($datos){
	    while($fila = @mysqli_fetch_array($datos)){
        echo '
              <div >
              <h4 class="producto" style="color: rgb(0,150,197)" >'.$fila["nombre"].'</h4>
              <img style="max-width:100px;" src="img/'.$fila["dir_img"].'">
              <h5 style="color: rgb(100,0,197)"> '.$fila["categoria"].'</h5>
              <span class="bookPrice" style="color: rgb(30,180,40); font-size:1.5em" data-price='.$fila["precio"].'> '.$fila["precio"].'</span><br>
              <button class="btn btn-primary agregar"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Add</button>
              </div>
              <div style="margin-left:100px;"><p style="font-size:1.3em; position:relative; top:-12.5em;text-align:left; margin-left:15px;"> '.$fila["descripcion"].'</p></div>
              <hr>

              ';

      }


}
 ?>
