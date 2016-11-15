<?php
sleep(2);
include("funciones.php");

    if(isset($_POST["email"], $_POST["pass"]) and $_POST["email"] <> "" and $_POST["pass"] <> "" ){
      // Si los datos llegan al servidor y son diferentes de vacio se conecta a la base de datos
      // Conexion a la base de datos  SALAB
      if($con = conectarBase($host, $user, $password, $base)){
        //Si se realiza la conexion se compara los datos obtenidos que coincidan en la base de datos
        $email=$_POST["email"];
        $pass=$_POST["pass"];


       $pass_encriptada = crypt($pass, "xtemp"); //Encriptacion nivel 3


          // Consulta para encontrar al usuario en la base de datos
          $query= "SELECT * FROM usuarios WHERE email='$email' and password='$pass_encriptada' ";

          if($datos = consultar($con,$query)){
            $fila = mysqli_fetch_array($datos);
           // Extrayendo y asignando valores
            $id = $fila["id"];
            $nombre = $fila["nombre"];
            $apellido = $fila["apellido"];
            $nickname= $fila["nom_user"];
            $email = $fila["email"];
            $tipoUsuario = $fila["type"];

            session_start();
		        $_SESSION["id"]=$id;
		        $_SESSION["nombre"]=$nombre;
            $_SESSION["nickname"]=$nickname;
            $_SESSION["apellido"]=$apellido;
            $_SESSION["email"]=$email;
            $_SESSION["type"]=$tipoUsuario;

            // Se procede a redirigir al usuario a la vista  que le corresponde
            if($tipoUsuario=="administrador"){
              echo "1"; // clave administrador
            }else if($tipoUsuario == "ejecutivo"){
              echo "2"; // clave ejecutivo
            }else if($tipoUsuario == "cliente"){
              echo "3"; // clave cliente
            }
          }else{
              echo "4"; // no se encuentra en el sistema
          }

      }else{
        echo "5"; // Error en la conexion en la base de datos
      }
    }else{
      echo "6"; // campos vacios
    }



 ?>
