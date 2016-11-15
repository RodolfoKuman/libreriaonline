<?php
  session_start();
  if($_SESSION["userType"] != "Administrador"){
    header('Location: index.html');
  }





  include('datos.php');
  include('funciones.php');

  if(isset($_POST['nombre']) and isset($_POST['apellido']) and isset($_POST['user']) and isset($_POST['email']) and isset($_POST['type']) and isset($_POST['password'] and isset($_POST['codigo'])
     and $_POST['nombre'] <> "" and $_POST['apellido'] <> "" and $_POST['user'] <> "" and $_POST['email'] <> "" and $_POST['type'] <> "" and $_POST['password'] <> ""  and $_POST['codigo'] <> ""  ){

  if($con = conectarBase($host, $user, $password, $base)){
    @mysqli_query($con,"SET NAMES 'utf8'");

    $nombre = $_POST['nombre'];
    $apellido= $_POST['apellido'];
    $nom_user= $_POST['user'];
    $email = $_POST['email'];
    $type = $_POST['type'];
    $password = $_POST['password'];

    $codigo = $_POST["codigo"];

    $consulta = "UPDATE usuarios  SET nombre = '$nombre',apellido = '$apellido', nom_user= '$nom_user' , email = '$type', type = $type
                WHERE id = $codigo ";

      if(mysqli_query($con, $consulta)){
        echo "<p> Registro actualizado </p>";
      }else{

        echo "<p> No se  actualizaron los campos </p>";
      }
  }else{
    echo "<p> Servicio interrumpido </p>";
  }

}else{
  echo "<p> No ha indicado cúal registro desea modificar </p>";
}

echo '<p> Regresar al <a href="../users.php">listado de usuarios</a> </p>';
  	?>
