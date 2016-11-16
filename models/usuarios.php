<?php



function tableUsers($datos){
  $codigo = '<div class="container tableUsers espaciado">';
	$codigo .= '<div class="row table-responsive">';
	$codigo .= '<table id="users" class="table table-bordered  table-striped " id="tableUsers" >';

	$codigo .='<th>Nombre</th>';
  $codigo .='<th>Apellido</th>';
  $codigo .='<th>Nickname</th>';
	$codigo .='<th>Email</th>';
	$codigo .='<th>Tipo</th>';
  $codigo .='<th>Fecha de alta</th>';
	$codigo .='<th class="centrar">Acción</th>';

	while($fila = @mysqli_fetch_array($datos)){

		$codigo .='<tr id="'.$fila["id"].'">';

		$codigo .= '<td>'.utf8_encode($fila["nombre"]).'</td>';
    $codigo .= '<td>'.utf8_encode($fila["apellido"]).'</td>';
    $codigo .= '<td>'.utf8_encode($fila["nom_user"]).'</td>';
		$codigo .= '<td>'.utf8_encode($fila["email"]).'</td>';
		$codigo .= '<td>'.utf8_encode($fila["type"]).'</td>';
		$codigo .= '<td>'.utf8_encode($fila["fecha_alta"]).'</td>';


		$codigo .= '<td  class="centrar"><a    class="btn btn-danger botonEliminar" data="'.$fila["id"].'" " ><span class="glyphicon glyphicon-trash " aria-hidden="true"></a>';
		$codigo .= '<a class="btn btn-primary margin-short" href="userEdit.php?codigo='.$fila["id"].'"><span class="glyphicon glyphicon-edit " aria-hidden="true"></span></a></td>';

		$codigo .='</tr>';

	}

	$codigo .= '</table>';
	$codigo .= '</div>';
	$codigo .= '</div>';

	return $codigo;

}



function editUser($datos){

	if($fila = mysqli_fetch_array($datos)){

		$nombreActual = utf8_encode($fila["nombre"]);
    $apellidoActual = utf8_encode($fila["apellido"]);
    $userActual = utf8_encode($fila["nom_user"]);
		$emailActual = utf8_encode($fila["email"]);
		$typeActual = utf8_encode($fila["type"]);

		$codigoActual = $fila["id"];

		$codigo = '<div class="contenedor ">

      <form id="actualizarUser" action=""  method="POST"  class=" style-4 clearfix ">
      <div class=" mensaje">

      </div>
      <h2>Editar usuario </h2>
        <div class="">
          <label for="">Nombre</label>
          <input type="text" required="true" name="nombre" id="nombre" value="'.$nombreActual.'">
          <span class="help-block"></span>
        </div>
        <div class="">
          <label for="">Apellido</label>
          <input type="text" name="apellido" id="apellido" required value="'.$apellidoActual.'">
          <span class="help-block"></span>
        </div>
        <div class="">
          <label for="">Nombre de usuario</label>
          <input type="text" name="user" id="user" placeholder="Mínimo 8 carácteres" required="true" value="'.$userActual.'">
          <span class="help-block"></span>
        </div>
        <div class="">
          <label for="">Email</label>
          <input type="email" name="email" id="email" placeholder="example@gmail.com" disabled="disabled" value="'.$emailActual.'">
          <span class="help-block"></span>
        </div>

        <div >
          <label for="tipousuario" class="col-sm-3 control-label">Tipo de usuario:</label>
            <div >
              <select name="type" id="type" class="form-control"  >
                <option name="type"  value="'.$typeActual.'">'.$typeActual.'</option>
                <option name="type" value="administrador">administrador</option>
                <option name="type" value="cliente">cliente</option>
                <option name="type" value="ejecutivo">ejecutivo</option>
              </select>
            </div>
             <input type="hidden" id="codigo" name="codigo" value="'.$codigoActual.'">
        </div>
        <div class="">
          <button style="margin-top:20px;"  class="btn btn-primary" id="botonActualizar">Actualizar</button>
        </div>
      </form>
      <p>Regresar al <a href="users.php">listado</a></p>
    </div>';

	}else{

		$codigo = false;

	}

	return $codigo;

}


 ?>
