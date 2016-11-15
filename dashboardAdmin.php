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
</div>

<?php include('views/footer.php'); ?>

</body>
</html>
