<?php

$conexion = new mysqli('localhost', 'discografia', 'discografia', 'discografia');

$consulta = "SELECT codigo, titulo FROM album";
$respuesta = $conexion->query($consulta);

$filas = $respuesta->fetch_all();

print "<ul>";
foreach ($filas as $valor) {

        print "<li><a href='album.php?cod=".$valor[0]."'>Album: ".$valor[1]."</li>";

}
print "</ul>";

?>