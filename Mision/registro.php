<?php
include('conexion.php');
if($_POST['contrasena1']==$_POST['contrasena2']){ //verifico pws
	$rut = $_POST['rut']; //recupero
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$cargo = $_POST['cargo'];
	$contraseña = md5($_POST['contrasena2']);
	$query = mysql_num_rows(mysql_query("SELECT * FROM personal WHERE rut = $rut")); //verifico si existe
	if($query <= 0){
		$insertar = "INSERT INTO personal (rut, nombre, apellido, cargo, contraseña) VALUES ('$rut', '$nombre', '$apellido', '$cargo', '$contraseña')";
		$run = mysql_query($insertar,$conexion);
		header("Location:crear_personal.php?error=no");
	}else{
		header("Location:crear_personal.php?error=2");
	};
}else{
	header("Location:crear_personal.php?error=1");
};
?>

<!-- incluir archivos requeridos.
	Verificar la confirmación de la contraseña.
		Recuperar las variables con los datos ingresados en el formulario. 
		Validar que el rut ingresado no se encuantre en la base de datos.
			Si ya existe un registro vinculado al rut ingresado:
				Redirigir a login y entregar mensaje.

			Si no existe:
			Insertar datos en tabla correspondiente.
			Redirigir a login y mostrar mensaje.

	Si las contraseñas no existen redirigir a login y mostrar mensaje. -->  


