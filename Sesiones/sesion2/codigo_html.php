<!DOCTYPE html>
<html>
<head>
    <title> Insertar PHP en código HTML </title>
    <meta charset="utf-8">
</head>
<body>
    
    <?php
    echo "Ahora debo crear 3 variables, con el numero de regiones del norte, centro y sur para luego sumarlas";
    $norte = 5;
    $centro = 4;
    $sur = 6;
    $total_regiones = $norte+$centro+$sur;
    $texto = "</br> Chile está dividido en $total_regiones regiones</br></br>";
    echo $texto;
    echo "$norte en el norte. </br> $centro en el centro. </br> $sur en el sur. </br>"
?>
    
</body>
</html>