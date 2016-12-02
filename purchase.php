<?php

session_start();

include('models/datos.php');

  if($con = mysqli_connect($host,$user,$password,$base)){
    $id_user = $_POST['id_user'];
    $direccion = $_POST['direccion'];
    $total = $_POST['total'];
    $telefono = $_POST['telefono'];
    $nombreTabla = $_POST['nombreTabla'];
    if($id_user <> "" and $direccion <> "" and $total <> "" and $telefono <> "" and $nombreTabla <> ""){
      $query2 = "SELECT nombre FROM usuarios WHERE id = '$id_user'";
      $result = mysqli_query($con,$query2);
      $row =mysqli_fetch_array($result);
      $nombre = $row['nombre'];

      $query = "INSERT INTO pedidos (destinatario,direccion,telefono,total,id_user) values ('$nombre','$direccion', '$telefono', '$total','$id_user')";
      $query3 = "DROP table $nombreTabla ";
      $result2 = mysqli_query($con,$query3);


      if(mysqli_query($con,$query) and mysqli_query($con,$query2)){

        echo "1";

      }else{
        echo "2".mysqli_error($con); // error
      }


    }else{
      echo "3"; //variables vacias
    }



  }else{
    echo '4'; // error en la conexion
  }


?>
