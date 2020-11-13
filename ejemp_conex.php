<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
<?php

include("conex.php");
echo "<p>Estamos conectados";

$cond=''; //"where nombre like 'a%'";
$sql="select * from tbl_provincias ".$cond;

echo "<pre>$sql</pre>";

$rs = mysqli_query($conexion,$sql);

if (!$rs) {
    echo "<p>Alago ha fallado";
    echo "<p>errno de depuración: " . mysqli_errno($conexion) . PHP_EOL;
    echo "<p>error de depuración: " . mysqli_error($conexion) . PHP_EOL;
} else {
    echo "<h1>DAtos consulta</h1>";
    echo "<p>Nº filas: " . mysqli_num_rows($rs);
    
    echo "<ul>";
    while($reg= mysqli_fetch_object($rs)) {
        //var_dump($reg);
        echo "<li>{$reg->nombre}</li>";
    }
    echo "</ul>";
    
}
mysqli_close($conexion);
?>
    </body>
</html>