<?php
  session_start();
  if($_SESSION["type"] != "administrador" ) {
    header('Location: ../index.html');
  }else if($_SESSION["id"]== 0){
	  header('Location: ../index.html');
  }


     include('datos.php');
     include('funciones.php');

     if($con = conectarBase($host,$user,$password,$base)){

       if(isset($_POST['nombre']) and isset($_POST['apellido']) and isset($_POST['user']) and isset($_POST['email']) and isset($_POST['type']) and isset($_POST['password'])
          and $_POST['nombre'] <> "" and $_POST['apellido'] <> "" and $_POST['user'] <> "" and $_POST['email'] <> "" and $_POST['type'] <> "" and $_POST['password'] <> ""  ){

            $nombre = $_POST['nombre'];
            $apellido= $_POST['apellido'];
            $nom_user= $_POST['user'];
            $email = $_POST['email'];
            $type = $_POST['type'];
            $password = $_POST['password'];

            $pass_encriptada = crypt($password, "xtemp"); //Encriptacion nivel 3

            $query = "INSERT into usuarios (nombre,apellido,nom_user,email,type,password,fecha_alta) values ('$nombre','$apellido','$nom_user','$email','$type','$pass_encriptada',now() )";

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
