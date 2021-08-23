<?php
include('sesion.php'); //se incluye sesion para nombres y permisos
include('conexion.php'); //se incluye conexion para consultas
?>
<!-- Inclución de archivos requeridos -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Agregar productos</title>
        <link rel="stylesheet" href="estilo.css"/>
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
                    // La siguiente validación verifica el cargo del usuario que esta viendo esta pagina para asignarle el flujo que tendra el links con imagen "Home".
                    if ($_SESSION['cargo']=='Admin') {
                            echo "<a href=principalAdmin.php><center><img src='imagenes/home.png'><br>Home<center></a>";
                    }else {
                            echo "<a href=principalBodega.php><img src='imagenes/home.png'><br>Home</a>";
                    };

                    error_reporting(E_ALL  ^  E_NOTICE  ^  E_WARNING);
                ?> 
            </div>
            
            <div class="derecha">
                <!-- La siguiente línea corresponde al links con imagen para finalizar sesión, que redirige a la página salir.php con la varible "sal=si" que destruye la sesión y nos 
                    muestra la pagina del login. -->
                <a href="salir.php?sal=si"><img src="imagenes/cerrar.png"><br>Salir</a>
            </div>
        </div>
        <br><h1 align="center">GESTIÓN DE PRODUCTOS</h1>     

            <div class="formulario">
                <form name="registro" method="post" action="" enctype="application/x-www-form-urlencoded">
                    <div class="campo">
                        <label for="codigo">Código del producto:</label>
                        <input type="text" name="codigo" required/>
                    </div>

                    
                    <div class="campo">
                        <label for="nombre">Descripción:</label>
                        <input type="text" name="descripcion" required/>
                    </div>

                    <div class="campo">
                        <label for="stock">Stock:</label>
                        <input type="number" name="stock" required/>
                    </div>
                    

                    <div class="campo">
                        <label for="proveedor">Proveedor:</label>
                        <input type="text" name="proveedor" required/>
                    </div>

                    <div class="campo">
                        <label for="fecha">Fecha ingreso:</label>
                        <input type="date" name="fecha" required/>
                    </div>

                    <div class="botones">
                        <input type="submit" name="crear" value="Agregar producto"/>
                    </div>
                    <?php
                    if($_GET['error']=='no'){ //se verifican errores o exitos
                        echo "<p align='center'>Producto ingresado.</p></br>";
                    }else if($_GET['error']=='1'){
                        echo "<p align='center'>No se aceptan numeros negativos en stock.<br>Intente Nuevamente.</p></br>";
                    }else if($_GET['error']=='2'){
                        echo "<p align='center'>Ya existe un producto con ese codigo.</p></br>";
                    }
                    if(isset($_POST['crear'])){ // se verifica si boton crear esta cargado
                        $codigo = $_POST['codigo']; //se recuperan las variables de post
                        $desc = $_POST['descripcion'];
                        $stock = $_POST['stock'];
                        $prov = $_POST['proveedor'];
                        $fecha = $_POST['fecha'];
                        $consulta = mysql_num_rows(mysql_query("SELECT * FROM productos WHERE cod_producto = '$codigo'")); //se solicita revisar el numero de casillas con el codido producto
                        if($consulta > 0){ //si existe
                            header("Location:agregar_producto.php?error=2"); //mensaje de error 2 ya existe
                            }else if($stock < 0){ //si no existe se reconoce si stock es un numero negativo por error
                            header("Location:agregar_producto.php?error=1"); //se envia mensaje de ser asi
                        }else{ //de estar vacia o no existir y ser un num positivo
                            $insertar = "INSERT INTO productos (cod_producto, descripcion, stock, proveedor, fecha_ingreso) VALUES ('$codigo', '$desc', '$stock', '$prov', '$fecha')"; //se insertan datos en bd
                            $run = mysql_query($insertar,$conexion) or die('No se ha podido completar la tarea solicitada'); //se ejecuta o da error
                            header("Location:agregar_producto.php?error=no"); //redireccion
                        }; //fin :)
                    };
                    ?>
                </form>
            </div>

        </div>
    </body>
</html>