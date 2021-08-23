<?php
include('conexion.php');
$usuario = $_POST['usuario'];
$pass = md5($_POST['pass']);
$consulta = "SELECT * FROM personal WHERE rut = '$usuario' AND contraseña = '$pass'";
$ejecutar = mysql_query($consulta,$conexion);
$resul = mysql_num_rows($ejecutar);
if($resul > 0) {
		session_start();
			$consulta2 = mysql_fetch_array(mysql_query("SELECT * FROM personal WHERE rut = '$usuario'"));
			$_SESSION['activo'] = true;
			$_SESSION['usuario'] = $usuario;
			$_SESSION['nombre'] = $consulta2['nombre']; 
			$_SESSION['apellido'] = $consulta2['apellido'];
			$_SESSION['cargo'] = $consulta2['cargo'];
			if($consulta2['cargo'] == 'Admin') {
				header("Location:principalAdmin.php");
			}else{
				header("Location:principalBodega.php");
			}
	}else{
	header("Location:login.php?error=si");
}
 ?>






   

