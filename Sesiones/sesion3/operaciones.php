<!DOCTYPE html>
<html>
<head>
    <title> Operaciones </title>
    <meta charset="utf-8">
</head>
<body>
   <?php
        function operaciones($var1, $var2, $var3) {
            $resultado = 0;
            if($var2 == "+") {
                $resultado = $var1 + $var3;
                echo "El resultao de: $var1 + $var3 = ";
            }else if($var2 == "-"){
                $resultado = $var1 - $var3;
                echo "El resultado de $var1 - $var3 = ";
            }else if($var2 == "/"){
                $resultado = $var1 / $var3;
                echo "El resultado de: $var1 / $var3 = ";
            }
            return $resultado;
        }
        $r = operaciones(12, "/", 3);
        echo "$r </br>";
        $r2 = operaciones(20, "-", 4);
        echo "$r2 </br>";
        $r3 = operaciones($r, "+", $r2);
        echo "$r3 </br>";
    ?>
    
</body>
</html>