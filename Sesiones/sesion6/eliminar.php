<?php
include ('sesion.php');
?>

<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8"/>
	<title>formulario eliminar PERSONAL</title>
	<link type="text/css" href="estilo.css" rel="stylesheet">

</head>

<body>
		<p>Bienvenido</p>
	<?php
echo $_SESSION['usuario'];
	?><br>
	<a href="salir.php?sal=si">CERRAR SESION</a>
	<h1 align="center">REGISTROS EXISTENTES</h1>
	<br><br>
	<?php
	include('conexion.php');
	$consulta ="SELECT * FROM registros";
	$ejecutar = mysql_query($consulta,$conexion);

	echo "<table width='80%' align='center'><tr>";
	echo "<th width='20%'>RUT</th>";
	echo "<th width='20%'>NOMBRE</th>";
	echo "<th width='20%'>APELLIDO</th>";
	echo "<th width='20%'>EMAIL</th>";
	echo "</tr>";

	while($result=mysql_fetch_array($ejecutar)){
		echo '<tr>';
		echo '<td width=20%>'.$result['rut'].'</td>';
		echo '<td width=20%>'.$result['nombre'].'</td>';
		echo '<td width=20%>'.$result['apellido'].'</td>';
		echo '<td width=20%>'.$result['email'].'</td>';
		echo "</tr>";
	}
echo "</table></br>";
?>
    <div><br><br>
			<form action="" method="post" align='center'>
		 	<label name="elimina">Ingresa el Rut del registro eliminar:</label>
		 	<input name='eliminar-registro' type="text">
		 	<input name='eliminar' type="submit" value="ELIMINAR">
		</form>
	<?php
if(isset($_POST['eliminar'])){
	$eliminar=$_POST['eliminar-registro'];
	$consulta= "DELETE FROM registros WHERE rut = '$eliminar'";
	$ejecutar=mysql_query($consulta,$conexion);
	header("Location:eliminar.php");
};
	?>

	    	
	</div>
</body>
</html>		 