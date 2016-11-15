<?php
  session_start();
  if($_SESSION["type"] != "administrador" ) {
    header('Location: index.html');
  }else if($_SESSION["id"]== 0){
	  header('Location: index.html');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.css">
  <title>Home</title>
</head>
<script   src="js/jquery.js"  ></script>
<script src="js/bootstrap.min.js" ></script>
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/formularios.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="js/bootstrap.min.js"></script>
<style media="screen">
  footer{
    position: fixed;
    bottom: 0;
  }
</style>
<body>



<?php include ('views/navPrincipal.php'); ?>

  <div class="container-fluid ">
     <?php

     include('models/datos.php');
     include('models/funciones.php');

     if($con = conectarBase($host,$user,$password,$base)){

       if(isset($_POST['nombre']) and isset($_POST['apellido']) and isset($_POST['user']) and isset($_POST['email']) and isset($_POST['password'])
          and $_POST['nombre'] <> "" and $_POST['apellido'] <> "" and $_POST['user'] <> "" and $_POST['email'] <> "" and $_POST['password'] <> ""  ){

            $nombre = $_POST['nombre'];
            $apellido= $_POST['apellido'];
            $nom_user= $_POST['user'];
            $email = $_POST['email'];
            $password = $_POST['password'];


            $pass_encriptada = crypt($password, "xtemp"); //Encriptacion

            $query = "INSERT into usuarios (nombre,apellido,nom_user,email,password,fecha_alta) values ('$nombre','$apellido','$nom_user','$email','$pass_encriptada',now() )";

            if(mysqli_query($con,$query)){
              echo "<p>Se ha registrado exitosamente</p>";
            }else{
              echo "<p>No se registro el usuario</p>".mysqli_error($con);
              echo $query;
            }


       }else{
          echo "<p>No ha pasado por el  <a href='../register.php'> formulario</a> de registro de usuarios</p>";
       }


     } else {
       echo "<p>Error en la conexion a la base de datos</p>";
     }

    // echo '<p> Regresar al <a href="../users.php"> listado de usuarios </a> </p>';
     ?>


  </div>





<?php include('views/footer.php'); ?>
</body>
</html>
