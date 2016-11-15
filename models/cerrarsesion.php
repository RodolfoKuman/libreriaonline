<?php
  session_start();
  //Eliminando las variables se sesión y sus valores
  $SESSION = array();
  //Eliminando cookie del usuario que identificaba al usuario ("si existia")
  if(ini_get("session.use_cookies") == true){
    $parametros = session_get_cookie_params();
    setcookie(session_name(), '', time() - 99999,
    $parametros["path"], $parametros["domain"],
    $parametros["secure"], $parametros["httponly"]);
  }
  session_destroy();
  header('Location: ../index.html');
 ?>
