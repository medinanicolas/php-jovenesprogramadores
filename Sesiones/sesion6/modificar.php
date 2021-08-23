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



		<div class="encabezado">
                <h1>Modificar registro</h1>
            </div>

            <div class="formulario">
                <form ="registro" method="post" action="" enctype="application/x-www-form-urlencoded">

                	<div class="campo">
                        <label name="Seleccionar">Ingresa el Rut del registro a modificar:</label>
		 				<input name='seleccionar' type="text" required>
                    </div>

                    <div class="campo">
                        <label for="rut">RUT:</label>
                        <input type="text" name="rut" required/>
                    </div>

                    <div class="campo">
                        <div class="en-linea izquierdo">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" required/>
                        </div>

                        <div class="en-linea">
                            <label for="apellido">Apellido:</label>
                            <input type="text" name="apellido" required/>
                        </div>
                    </div>

                    <div class="campo">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" name="email" required/>
                    </div>

                    <div class="botones">
                        <input type="submit" name="modificar" value="Modificar"/>
					</div>
				</form>
			    <?php
                    if(isset($_POST['modificar'])){
                        $seleccionar=$_POST['seleccionar'];
                        $rut=$_POST['rut'];
                        $nombre=$_POST['nombre'];
                        $apellido=$_POST['apellido'];
                        $email=$_POST['email'];
                        $consulta = "UPDATE registros SET rut = '$rut', nombre = '$nombre', apellido = '$apellido', email = '$email' WHERE rut = '$seleccionar'";
                        $ejecutar = mysql_query($consulta,$conexion);
                        header("Location:modificar.php");
                    };
                ?>

			    
			</div>
		</div>
</body>
</html>		