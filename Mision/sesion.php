<?php
	session_start();
	if($_SESSION['activo']==false){
		header("Location:salir.php?sal=si");
	}
?>

<!-- Evaluar que la sesión continue, verificando la variable de sesión creada para este propósito.
	Si la variable cambió su valor inicial se enviará la variable error=si al archivo salir.php -->

