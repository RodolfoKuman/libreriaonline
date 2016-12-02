<?php

include('datos.php');
include('funciones.php');



if($con = conectarBase($host,$user,$password,$base)){


  if(isset($_POST['id'], $_POST['nombreTabla'])  <> "" ){

      $id = $_POST['id'];
      $nombreTabla = $_POST['nombreTabla'];
      $query = "DELETE FROM  $nombreTabla WHERE  id = '$id'";

       if(mysqli_query($con,$query)){
         echo "1";  //se elimino el item
       }else {
         echo "2"; // Error en la consulta
       }


  }else{
     echo "3";   // Las variables llegaron vacias
  }


} else {
  echo "4";     // Error en la conexion con la base de datos
}

?>
