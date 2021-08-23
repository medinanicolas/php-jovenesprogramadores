<?php
include('conexion.php');
if($_POST['contrasena1']==$_POST['contrasena2']) {
	$rut = $_POST['rut'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];
	$contraseña = md5($_POST['contrasena2']);
	$consulta = "INSERT INTO registros (rut, nombre, apellido, email, contraseña) VALUES ('$rut', '$nombre', '$apellido', '$email', '$contraseña')";
	$ejecutar = mysql_query($consulta, $conexion) or die ('No se ha podido completar el formulario');
	header("Location:formulario.php?valida=si");
}else{
	header("Location:formulario.php?erronea=si");
};
?>