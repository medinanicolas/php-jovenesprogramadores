<?php
ob_start();
include('sesion.php');
?>
<!-- Incluir archivos requeridos -->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Modificar producto</title>
		<link type="text/css" href="estilo.css" rel="stylesheet">

	</head>

	<body>
		<div class="contenedor">
			<div class= "encabezado">
				<div class="izq">
					<p>Bienvenido/a:<br>
                    <?php
                    echo $_SESSION['nombre'];
                    echo ' ';
                    echo $_SESSION['apellido'];
                    ?>
                	</p>
				</div>

				<div class="centro">
					<?php
						// Las siguientes 5 líneas verifican el cargo del usuario que esta viendo esta pagina para asignarle el flujo que tendra el links con imagen "Home".
						if ($_SESSION['cargo']=='Admin') {
							echo "<a href=principalAdmin.php><center><img src='imagenes/home.png'><br>Home<center></a>";
						}else {
							echo "<a href=principalBodega.php><img src='imagenes/home.png'><br>Home</a>";
						}
	       			?>
				</div>
				
				<div class="derecha">
					<!-- La siguiente línea corresponde al links con imagen para finalizar sesión, que redirige a la página salir.php con la varible "sal=si" que destruye la sesión y nos 
					muestra la pagina del login. -->
					<a href="salir.php?sal=si"><img src="imagenes/cerrar.png"><br>Salir</a>
				</div>
			</div>
			<br><h1 align="center">PRODUCTOS EXISTENTES</h1><br>
			<?php
				include('conexion.php');

				$consulta="SELECT * FROM productos";
				$ejecutar=mysql_query($consulta,$conexion);
			
				echo "<table  width='80%' align='center'><tr>";	         	  
				echo "<th width='10%'>CODIGO PRODUCTO</th>";
				echo "<th width='20%'>DESCRIPCIÓN</th>";
				echo "<th width='10%'>STOCK</th>";
				echo "<th width='20%'>PROVEEDOR</th>";
				echo "<th width='20%'>FECHA DE INGRESO</th>";
				echo "</tr>";
			
				while($result=mysql_fetch_array($ejecutar)){	
		          	
		          echo "<tr>";	         	  
				  echo '<td width=10%>'.$result['cod_producto'].'</td>';
				  echo '<td width=20%>'.$result['descripcion'].'</td>';
				  echo '<td width=20%>'. $result['stock'].'</td>';
				  echo '<td width=20%>'.$result['proveedor'].'</td>';
				  echo '<td width=20%>'.$result['fecha_ingreso'].'</td>';
				  echo "</tr>";
				}
				echo "</table></br>";
			?>


			<div class="encabezado">
	        	<h1>Modificar producto</h1>
	        </div>

	        <div class="formulario">

	            <form name="actualizar" method="post" action="" enctype="application/x-www-form-urlencoded">
	           		<div class="campo">
	               		<p>Para actualizar el stock de un producto ingresa el código del producto y la cantidad que deseas agregar. Para quitar deber ingresar la cantidad anteponiendo el signo menos (-) a la cantidad</p><br><br>

	                    <label name="Seleccionar">Ingresa el código del producto que deseas actualizar:</label>
			 			<input name='seleccionar' type="text" required>
	                </div>

	                <div class="campo">
	                    <div class="en-linea izquierdo">
	                        <label for="descrip">Stock:</label>
	                        <input type="number" name="stock" required/>
	                    </div>

	                    <div class="en-linea">
	                        <label for="apellido">Stock:</label>
	                        <input type="submit" name="actualiza" value="Actualizar" required/>
	                    </div>
	                </div>

	            </form>
	            <?php
	            		if(isset($_POST['actualiza'])){ //se verifica
							$seleccionar = $_POST['seleccionar']; //se recupera
							$stock = $_POST['stock'];
							$consulta1 = mysql_fetch_array(mysql_query("SELECT * FROM productos WHERE cod_producto = '$seleccionar'")); //se lee
							$stock = $stock+$consulta1['stock'];  //(positivo + negativo = neg)
							$consulta2 = "UPDATE productos SET stock = '$stock' WHERE cod_producto = '$seleccionar'"; //modifica
							$ejecutar = mysql_query($consulta2,$conexion);
							header("Location:mod_producto.php"); //ya sabemos que pasa por aqui
						};
						?>
	            <form name="modificar" method="post" action="" enctype="application/x-www-form-urlencoded">

	                <div class="campo">
	                    <label name="Seleccionar">Ingresa el código del producto que deseas modificar:</label>
			 			<input name='seleccionar' type="text" required>
	                </div>

	                <div class="campo">
	                    <label for="descrip">Descripción:</label>
	                    <input type="text" name="descripcion" required/>
	                </div>

	                <div class="campo">
	                    <label for="cargo">Proveedor:</label>
		                <input type="text" name="proveedor" required/>
	                </div>

	                <div class="campo">
	                    <label for="cargo">Fecha ingreso:</label>
		                <input type="date" name="fecha" required/>
	                </div>

	                <div class="botones">
	                    <input type="submit" name="modificar" value="Modificar"/>
					</div>
				</form>
				<?php
						if(isset($_POST['modificar'])){
							$seleccionar = $_POST['seleccionar'];
							$descripcion = $_POST['descripcion'];
							$proveedor = $_POST['proveedor'];
							$fecha = $_POST['fecha'];
							$consulta = "UPDATE productos SET descripcion = '$descripcion', proveedor = '$proveedor', fecha_ingreso = '$fecha' WHERE cod_producto = '$seleccionar'";
							$ejecutar = mysql_query($consulta,$conexion);
							header("Location:mod_producto.php?");
						};
				?>
			</div>
		</div>
	</body>
</html>