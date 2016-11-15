<?php
require("datos.php");
require("funciones.php");
sleep(1);
      $dato=$_POST["dato"];
      $caso=$_POST["caso"];


   if($conexion = conectarBase($host,$user,$password,$base)){
     switch ($caso){
     	case "usuario":
     		//Sentencia SQL para buscar en la tabla un usuario con el nombre de usuario
     		$query2= "select * from $usuarios WHERE nombre='$dato'";
     		//Ejecuto la sentencia
     		$rs2 = mysqli_query($conexion,$query2);
     		if (mysqli_num_rows($rs2)!=0){
     			//correo ya registrado
     			echo 1;
     		}else{
     			//correo disponible
     			echo 0;
     		}
     	break;

     	case "mail":
     			//Sentencia SQL para buscar en la tabla un usuario con esos email
     			$query3= "select * from usuarios WHERE email='$dato'";
     			//Ejecuto la sentencia
     			$rs3= mysqli_query($conexion,$query3);
     			if (mysqli_num_rows($rs3)!=0){
     				//usuario ya registrado
     				echo 2;
     			}else{
     				//nikname disponible
     				echo 0;
     			}
     	break;
     }
   }


?>
