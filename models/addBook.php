<?php
session_start();
  if($_SESSION["type"] == "administrador" || $_SESSION["type"] == "ejecutivo" ) {
    $user=$_SESSION["nombre"];
  }
  else {
    header('Location: ../index.html');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/bootstrap.css" >
  <link rel="stylesheet" href="../css/font-awesome.min.css" >
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/formularios.css">
  <link rel="stylesheet" href="../css/dashboardAdmin.css">
  <title>Libros</title>
</head>
<style>
  footer{
    position: absolute;
    bottom: 0;
  }
</style>
<script   src="../js/jquery.js"  ></script>
<script src="../js/bootstrap.min.js" ></script>
<body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand white" href="#">Librerias Shakespeare</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">Mi perfil</a></li>
        <li><a href="#">Pedidos</a></li>
        <li><a href="../books.php">Libros</a></li>
        <li><a href="../login.php">Categorías</a></li>
        <li><a href="../users.php">Usuarios</a></li>
        <li><a href="#">Bitácora</a></li>
        <li><?php echo '<a style= "color:#6399D9;" >'."Hola! ".$_SESSION["nickname"].'</a>'; ?></li>
        <li><a href="cerrarsesion.php">Cerrar sesión</a></li>
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>
<?php
     include('datos.php');
     include('funciones.php');

     $nombre = $_POST['nombre'];
     $editorial= $_POST['editorial'];
     $descripcion= $_POST['descripcion'];
     $categoria = $_POST['categoria'];
     $precio = $_POST['precio'];
     $imagen=$_FILES["imagen"]["name"];
     $ruta=$_FILES["imagen"]["tmp_name"];
     $destino="../img/"."".$imagen;
     copy($ruta,$destino);

     if($con = conectarBase($host,$user,$password,$base)){

       if(isset($_POST['nombre']) and isset($_POST['editorial']) and isset($_POST['descripcion']) and isset($_POST['categoria']) and isset($_POST['precio']) ){


            $query = "INSERT into libros (nombre,editorial,descripcion,categoria,precio,dir_img) values ('$nombre','$editorial','$descripcion','$categoria','$precio','$destino' )";

            if(mysqli_query($con,$query)){
              echo "<h2>Libro registrado</h2>";  //registrado correcto
            }else {
              echo "Error al registrar libro".mysqli_error($con); // Error en la consulta o en la conexion
            }


       }else{
          echo "<h4>Debe pasar por el formulario</h4>";   // Las variables llegaron vacias
       }


     } else {
       echo "<h4>Error en la base de datos</h4>";     // Error en la conexion con la base de datos
     }
     echo "<h4>Regresar al listado de  <a href='../books.php'>libros</a></h4>";
     include("../views/footer.php");
     ?>
</body>
</html>
