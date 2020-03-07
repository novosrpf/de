<?php

  require_once('constantes.php');

  // 1.- Conexion a la base de datos    
  $conexion = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
  if (!$conexion) {
    die("No se ha podido conectar al servidor: " . mysql_error());
  } else  {
    //echo "Correctamente conectados a la base de datos MySQL. <br/>";
    // 2.- Seleccionar la base de datos
    $db_seleccionada = mysql_select_db(DB_NAME, $conexion);
    if (!$db_seleccionada) {
        die("no hemos podido seleccionar la base de datos. ". mysql_error() . "<br />");
    } else{
        //echo "Base de datos correctamente seleccionada.  <br />";
    }
  }
?>
  