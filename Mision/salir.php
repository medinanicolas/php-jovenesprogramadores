<?php
if($_GET['sal']=='si'){ //variable sal igual a si
	session_start(); 
	session_destroy(); //se cierra la sesion
	header("Location:login.php"); //redigire al login
}
?>
<!-- Verificar que la variable sal sea igual a si.
Cerrar la sesión. 
Redirigir el flujo a la pagina del login --> 
