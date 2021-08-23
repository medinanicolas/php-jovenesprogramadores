<?php
$conexion = mysql_connect("localhost", "root", "") or die("No conectado </br>");
echo "Conexion exitosa! </br>";
mysql_set_charset('utf8');
mysql_select_db("registro_usuarios") or die ("Base de datos no encontrada :( </br>");
echo ("Base de datos encontrada :) </br>");
?>