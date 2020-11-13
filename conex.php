<?php
define('HOST', 'localhost');
define('USER', 'root');

$conexion = 
    mysqli_connect(HOST,USER, 
            "", 
            "provincias");

if (!$conexion) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
mysqli_set_charset($conexion, "utf8");