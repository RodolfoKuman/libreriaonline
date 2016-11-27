<?php

include('datos.php');
include('funciones.php');
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$nombreTabla = $_POST['nombreTabla'];


if($con = conectarBase($host,$user,$password,$base)){

  if(isset($_POST['nombre']) and isset($_POST['precio']) and isset($_POST['nombre']) <> "" and isset($_POST['precio']) <> "" ){

      $query = "INSERT into $nombreTabla (nombre,precio) values ('$nombre','$precio')";

       if(mysqli_query($con,$query)){
         echo "1";  //registrado correcto
       }else {
         echo "2"; // Error en la consulta o en la conexion
       }


  }else{
     echo "3";   // Las variables llegaron vacias
  }


} else {
  echo "4";     // Error en la conexion con la base de datos
}

?>
