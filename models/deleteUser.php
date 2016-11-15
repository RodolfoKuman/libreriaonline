<?php
session_start();
if($_SESSION["type"] != "administrador" ) {
  header('Location: ../index.html');
}else if($_SESSION["id"]== 0){
  header('Location: ../index.html');
}

    include("datos.php");
    include("funciones.php");

    if(isset($_POST["codigo"]) and $_POST["codigo"] <> "" ){

    if($con = conectarBase($host , $user, $password, $base)){

      $codigo = $_POST["codigo"];
      $consulta = "DELETE FROM usuarios WHERE id = '$codigo'";

        if(mysqli_query($con, $consulta)){
          echo "1"; //se elimino correctamente el usuario
        }else{
          echo "2"; //No se pudo eliminar el usuario
        }


    }else{
      echo "3"; // Error en la conexion con la BD
    }

    }else{
    echo '4'; // No llego el id del user
    }

    	?>
