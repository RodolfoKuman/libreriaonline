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
	<title>Iniciar sesión</title>
	<link rel="stylesheet" href="css/bootstrap.css" >
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/dashboardAdmin.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="js/jquery.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<style>
	footer{
		position: absolute;
		bottom: 0;
	}
</style>
<body>
<?php include('views/navAdmin.php'); ?>

<div class="contenedor">
  <h2>Datos personales</h2>
  <?php
  echo'
        <h4>Nombre: '.$_SESSION["nombre"].'</h4>
        <h4>Apellido: '.$_SESSION["apellido"].'</h4>
        <h4>Nickname: '.$_SESSION["nickname"].'</h4>
        <h4>Email: '.$_SESSION["email"].'</h4>
        <a href="editProfile.php" class="btn btn-primary">Editar</a>
      ';
   ?>
</div>

<?php include('views/footer.php'); ?>

</body>
</html>
