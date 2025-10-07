<?php

$conexion = new mysqli('localhost', 'tienda', 'tienda', 'tienda');
//print $conexion->server_info;

$consulta = "SELECT producto, unidades FROM stock";
$respuesta = $conexion->query($consulta);

$filas = $respuesta->fetch_object();
print "<ul>";
while ($filas != null) {

    print "<li>Producto: ".$filas->producto." Cantidad: ".$filas->unidades."</li>";
    $filas = $respuesta->fetch_object();
}
print "</ul>";


?>