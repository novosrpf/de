<?php
  $mysqli = new mysqli("localhost","ruben", "ruben", "diagnosticos");

    if (mysqli_connect_errno()){

      echo "Conexion fallida: ", mysqli_connect_errno();
      exit();
    }

?>
