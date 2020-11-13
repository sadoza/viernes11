<?php
    include("conex.php");

    echo "<p>Estamos conectados";

    if (filter_has_var(INPUT_GET, 'pag')) {
        $pag= filter_input(INPUT_GET, 'pag');
    }
    else {
        $pag=0;
    }
    $elem_x_pagina=5;
    $offset=$pag*$elem_x_pagina;
    $sql="select nombre, cod from tbl_provincias limit $offset, $elem_x_pagina";
    echo "<pre>$sql</pre>";
    $rs = mysqli_query(
            $conexion,$sql );

    if (!$rs) {
        echo "<p>Alago ha fallado";
        echo "errno de depuración: " . mysqli_errno($conexion) . PHP_EOL;
        echo "error de depuración: " . mysqli_error($conexion) . PHP_EOL;
    } else {
        echo "<h1>DAtos consulta</h1>";
        echo "<p>Nº filas: " . mysqli_num_rows($rs);
    }
// Recorro las comunidades
    echo "<h1>Página $pag</h1>";
    echo "<ol>";
    while ( $reg=mysqli_fetch_assoc($rs)) {
        echo "<li>"; 
        print_r($reg);
    }
    echo "</ol>";
    echo "<p>".
            "<a href='?pag=".($pag-1)."'>Anterior</a> ".
            "<a href='?pag=".($pag+1)."'>Siguiente</a> </p>";

function Formulario() { ?>
<form method="post">
    Comienza por: <input name="comienzo" type="text">
    <button type="submit">Enviar</button>
</form>     
<?php }