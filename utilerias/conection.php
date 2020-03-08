<?php
  $mysqli = new mysqli("localhost","root", "", "de");

    if (mysqli_connect_errno()){

      echo "Conexion fallida: ", mysqli_connect_errno();
      exit();
    }

?>
