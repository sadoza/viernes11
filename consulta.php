<?php

if (!$_POST) : 
    Formulario();

else :
    if ($_POST['comienzo']=='') {
        Formulario();
        exit;
    }
    include("conex.php");

    echo "<p>Estamos conectados";

    $stmt=mysqli_prepare($conexion,
            $sql="select nombre, cod from tbl_provincias where nombre like ?");
    $valor_campo=$_POST['comienzo'].'%';
    $stmt->bind_param("s", $valor_campo);
     $stmt->bind_result($nombre, $cod);
    echo "<h2>SQL</h2><pre>$sql</pre>";
    $rs=$stmt->execute();
//    $rs = mysqli_query(
//            $conexion,$sql );

//    if (!$rs) {
//        echo "<p>Alago ha fallado";
//        echo "errno de depuración: " . mysqli_errno($conexion) . PHP_EOL;
//        echo "error de depuración: " . mysqli_error($conexion) . PHP_EOL;
//    } else {
//        echo "<h1>DAtos consulta</h1>";
//        echo "<p>Nº filas: " . mysqli_num_rows($rs);
//    }
// Recorro las comunidades
    while ( $stmt->fetch()) {
        echo "<p> $nombre - $cod";
        //print_r($reg);
    }
endif; 

function Formulario() { ?>
<form method="post">
    Comienza por: <input name="comienzo" type="text">
    <button type="submit">Enviar</button>
</form>     
<?php }