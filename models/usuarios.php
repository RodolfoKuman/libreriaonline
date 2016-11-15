<?php



function tableUsers($datos){
  $codigo = '<div class="container tableUsers espaciado">';
	$codigo .= '<div class="row table-responsive">';
	$codigo .= '<table class="table table-bordered  table-striped " id="tableUsers" >';

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
		$emailActual = utf8_encode($fila["email"]);
		$telefonoActual = utf8_encode($fila["telefono"]);
		$typeActual = utf8_encode($fila["tipoUser"]);

		$codigoActual = $fila["id"];

		$codigo = '<div class="container ">
      <form class="form-horizontal" method="post" action="funciones/userUpdate.php">
        <div class="form-group">
          <label for="nombre" class="col-sm-3 control-label">Nombre:</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="nombre" id="nombre" value="'.$nombreActual.'"">
            </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-3 control-label">Email:</label>
            <div class="col-sm-5">
              <input type="email" class="form-control" name="email" id="email" value="'.$emailActual.'"">
            </div>
        </div>
        <div class="form-group">
          <label for="telefono" class="col-sm-3 control-label">Telefono:</label>
            <div class="col-sm-5">
              <input type="phone" class="form-control" name="telefono" id="telefono" value="'.$telefonoActual.'"">
            </div>
        </div>
        <div class="form-group">
          <label for="tipousuario" class="col-sm-3 control-label">Tipo de usuario:</label>
            <div class="col-sm-5">
              <select name="type" id="type" class="form-control"  >
              <option name="Administrador"  value="'.$typeActual.'"><?php echo "$typeActual"; ?></option>
                <option name="Administrador" value="Administrador">Administrador</option>
                <option name="salab" value="salab">SALAB</option>
                <option name="inventarios" value="inventarios">Inventarios</option>
                <option name="helpdesk" value="helpdesk">Help-desk</option>
                <option name="helpdesk" value="residencia">Residencia</option>
              </select>
            </div>

        </div>
          <input type="hidden" name="codigo" value="'.$codigoActual.'">
        <input class="btn btn-default col-sm-offset-4 col-sm-2 boton" type="submit" name="name" value="Actualizar">
      </form>
    </div>';

	}else{

		$codigo = false;

	}

	return $codigo;

}


 ?>
