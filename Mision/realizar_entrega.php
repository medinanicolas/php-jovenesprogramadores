
<?php
include('sesion.php'); //<!-- Incluir archivos requeridos -->
?>
<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Entregas</title>
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
                    <a href=principalBodega.php><img src='imagenes/home.png'><br>Home</a>
                </div>
                
                <div class="derecha">
                    <a href="salir.php?sal=si"><img src="imagenes/cerrar.png"><br>Salir</a>
                </div>
            </div>
                
            
            <br><h1 align='center'>PRODUCTOS EXISTENTES</h1><br>
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
                echo  "</tr>"; 
            
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

            <form action="" method="post" align='center'>

                <div class="campo">
                    <label name="rut">Rut personal que retira:</label>
                    <input name='rut' type="text">
                </div>

                <div class="campo">
                    <label name="cod">Código del producto:</label>
                    <input name='codigo' type="text">
                </div>

                <div class="campo">
                    <label name="cantd">Cantidad:</label>
                    <input name='cantidad' type="text">
                </div>

                <div class="campo">
                    <label name="cantd">Fecha entrega:</label>
                    <input name='fecha' type="date">
                </div>
                
                <div class="botones">
                    <input name='agregar' type="submit" value="Agregar">
                </div>
                
            </form>
            <?php
            if(isset($_POST['agregar'])){ //se verifica
                $rut = $_POST['rut']; //recupera variables
                $codigo = $_POST['codigo'];
                $cantidad = $_POST['cantidad'];
                $fecha = $_POST['fecha'];
                $consulta = mysql_num_rows(mysql_query("SELECT * FROM productos WHERE cod_producto = '$codigo'")); //se solicita revisar el numero de casillas con el codido producto
                    if($consulta <= 0){
                        echo "<p align='center'>No existe codigo de producto.</p></br>";
                    }else{
                        $consulta1 = mysql_fetch_array(mysql_query("SELECT * FROM productos WHERE cod_producto = '$codigo'")); //num de casillas
                        $stock = $consulta1['stock']-$cantidad; //se resta cantidad a stock
                        $descontar = mysql_query("UPDATE productos SET stock = '$stock' WHERE cod_producto = '$codigo'"); //se modifica stock
                        $insertar = "INSERT INTO entregas (rut, cod_producto, cantidad, fecha_entrega) VALUES ('$rut', '$codigo', '$cantidad', '$fecha')"; //se inserta registro de entrega
                        $run = mysql_query($insertar,$conexion); //run
                        header("Location:realizar_entrega.php"); //redireccion
                    }            
            };
            ?>
            <!-- Verificar que la variable del boton submit este creada.
                Recuperar las variables con los datos ingresados. 
                Descontar la cantidad ingresada al stock existente del producto a retirar.
                Insertar los datos ingresados en la tabla "entregas" de la base de datos. 
        </div>
    </body>
</html> 