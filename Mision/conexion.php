<!-- Conexión a la base de datos,
codificación de caracteres,
seleccion de base de datos. -->
<?php

$conexion = mysql_connect("localhost", "root", "") or  die("No se ha podido establecer la conexion con el servidor</br>"); //establece la onexion o da mensaje de error

mysql_set_charset('utf8'); //se establece la codificacion

mysql_select_db("gestion_bodega") or die("Desafortunadamente no hemos encontrado la Base de Datos</br>"); //se selecciona la bases de datos

?>