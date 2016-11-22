<?php
session_start();
  if($_SESSION["type"] == "administrador" || $_SESSION["type"] == "ejecutivo" ) {
    $user=$_SESSION["nombre"];
  }

  else {
    header('Location: ../index.html');
  }
    include("datos.php");
    include("funciones.php");

    if(isset($_POST["codigo"]) and $_POST["codigo"] <> "" ){

    if($con = conectarBase($host , $user, $password, $base)){

      $codigo = $_POST["codigo"];
      $consulta = "DELETE FROM libros WHERE id = '$codigo'";

        if(mysqli_query($con, $consulta)){
          echo "1"; //se elimino correctamente el libro
        }else{
          echo "2"; //No se pudo eliminar el libro
        }


    }else{
      echo "3"; // Error en la conexion con la BD
    }

    }else{
    echo '4'; // No llego el id del libro
    }

    	?>
