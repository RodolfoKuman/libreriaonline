<?php

include("datos.php");

	function conectarBase($host , $user, $password, $base){
		if(!$enlace = mysqli_connect($host , $user, $password, $base)){
			return false; 		//Si no pudo conectarse retorna false
		}
		else{
			return $enlace;		// Si pudo conectarse devuelve el link a esa conexion
		}
	}

	function consultar($conexion,$consulta){

		if(!$datos = mysqli_query($conexion,$consulta) or mysqli_num_rows($datos) < 1 ){
			return false; // Si la consulta fue rechazada por error de sintaxis o ningun registro coincide con lo buscado retornamos false
		}
		else{
			return $datos; // Si encontraron datos los devolvemos al punto en donde fue llamada la funcion
		}
	}

 ?>
