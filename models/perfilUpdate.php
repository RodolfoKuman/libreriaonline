<?php
session_start();

  include('datos.php');
  include('funciones.php');

  if(isset($_POST['nombre']) and isset($_POST['apellido']) and isset($_POST['user'])   and isset($_POST['codigo'])
     and $_POST['nombre'] <> "" and $_POST['apellido'] <> "" and $_POST['user'] <> ""  and $_POST['codigo'] <> ""  ){

  if($con = conectarBase($host, $user, $password, $base)){
    @mysqli_query($con,"SET NAMES 'utf8'");

    $nombre = $_POST['nombre'];
    $apellido= $_POST['apellido'];
    $nom_user= $_POST['user'];

    $codigo = $_POST["codigo"];

    $_SESSION["nombre"]=$nombre;
    $_SESSION["nickname"]=$nom_user;
    $_SESSION["apellido"]=$apellido;

    $consulta = "UPDATE usuarios  SET nombre = '$nombre', apellido = '$apellido', nom_user = '$nom_user'
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
