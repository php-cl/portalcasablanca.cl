<?php
 $servidor = 'localhost';
 $usuario = 'root';
 $password = '24741';
 $base_datos = 'dbportal';
 $conexion = mysql_connect($servidor,$usuario ,$password,$base_datos)
 or die(mysql_error());
 mysql_select_db($base_datos,$conexion);
?>