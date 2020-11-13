<?php

include("conex.php");
// En $conexion está la conexión

/*
 * Comunidades [ 
 *    [nombre=>'Andalucía', provs=>[P1, P2, ...]],
 *    [nombre=>'Aragon', provs=>[P1, P2, ...]],
 */

$comunidades=[];
$sql_ccaa="select * from tbl_comunidadesautonomas";
$rs_ccaa= mysqli_query($conexion, $sql_ccaa);
// Recorro las comunidades
while($reg_ccaa= mysqli_fetch_assoc($rs_ccaa)) {
    $provincias=[];
    $ca_id=$reg_ccaa['id'];
    $sql_prov="select * from tbl_provincias where comunidad_id=$ca_id";
    $rs_prov= mysqli_query($conexion, $sql_prov);
    while($reg_prov= mysqli_fetch_assoc($rs_prov)) {
        //$provincias[]=$reg_prov['nombre'];
        array_push($provincias, $reg_prov['nombre']);
    }
    $comunidades[]=[
      'nombre'=>$reg_ccaa['nombre'],
      'provs'=>$provincias
    ];
}

// Comunidades tiene todas las ccaa y provincias

//echo "<pre>";
//print_r($comunidades);

?>
<table border="1">
    <?php foreach($comunidades as $ccaa): 
        $primera_vez=true;?>
    <tr>
        <td rowspan="<?=count($ccaa['provs'])?>">
            <?=$ccaa['nombre']?>
        </td>
        <?php foreach($ccaa['provs'] as $prov): 
            if (!$primera_vez) {
                echo "<tr>";
            }
            ?>
            <td><?=$prov?></td>
            <?php
            if (!$primera_vez) {
                echo "</tr>";
            }
            else {
                $primera_vez=false;
            }
            ?>
        <?php endforeach; ?>    
    </tr>
    <?php endforeach; ?>
</table>