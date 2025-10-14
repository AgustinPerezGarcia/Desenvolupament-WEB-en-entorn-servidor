<?php

$conexion = new mysqli('localhost', 'user', 'user', 'tienda');
//print $conexion->server_info;

$consulta = "SELECT cod, nombre_corto FROM producto";
$respuesta = $conexion->query($consulta);

$filas = $respuesta->fetch_all();

print "<ul>";
foreach ($filas as $valor) {

        print "<li><a href='stock.php?cod=".$valor[0]."'>Producto: ".$valor[1]."</li>";

}
print "</ul>";
$filas = $respuesta->fetch_assoc();


?>