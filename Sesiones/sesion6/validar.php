<?php
include('conexion.php');
$usuario = $_POST['usuario'];
$pass = md5($_POST['pass']);
$consulta = "SELECT * FROM registros WHERE rut = '$usuario' AND contraseña = '$pass'";
$ejecutar1 = mysql_query($consulta, $conexion);
$resul = mysql_num_rows($ejecutar1);
if($resul > 0) {
	/*while($resul = mysql_fetch_array($ejecutar1)) {
		echo $resul['rut'].' - '.$resul['nombre'].' - '.$resul['apellido'].' - '.$resul['email'].' - '.$resul['contraseña']; */
		session_start();
			$_SESSION['activo'] = true;
			$_SESSION['usuario'] = $usuario;

			if($usuario == '153412977') {
				header("Location:eliminar.php");
			}else if($usuario == '132497123'){
				header("Location:modificar.php");

			}else if($usuario == '91273320'){
				header("Location:mostrar.php");
			}
	}else{
	header("Location:formulario.php?error=si");
}
?>