<?php
session_start();
if($_SESSION["type"] == "administrador" || $_SESSION["type"] == "ejecutivo" ) {
//  $user=$_SESSION["nombre"];
}

else {
  header('Location: ../index.html');
}

  include('datos.php');
  include('funciones.php');

  if(isset($_POST['nombre']) and isset($_POST['editorial']) and isset($_POST['descripcion']) and isset($_POST['categoria']) and isset($_POST['precio'])  and isset($_POST['codigo'])
     and $_POST['nombre'] <> "" and $_POST['editorial'] <> "" and $_POST['descripcion'] <> "" and $_POST['categoria'] <> "" and $_POST['precio'] <> ""   and $_POST['codigo'] <> ""  ){

  if($con = conectarBase($host, $user, $password, $base)){
    @mysqli_query($con,"SET NAMES 'utf8'");

    $nombre = $_POST['nombre'];
    $editorial= $_POST['editorial'];
    $descripcion= $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];


    $codigo = $_POST["codigo"];

    $consulta = "UPDATE libros  SET nombre = '$nombre', editorial = '$editorial', descripcion = '$descripcion' , categoria = '$categoria', precio = '$precio'
                WHERE id = $codigo ";

      if(mysqli_query($con, $consulta)){
        echo "1"; //Registro actualizado
      }else{

        echo "2"; //Error al actualizar
      }
  }else{
    echo "3"; // Error en la conexion a la base de datos
  }

}else{
  echo "4";// No selecciono el registro a actualizar
}


  	?>
