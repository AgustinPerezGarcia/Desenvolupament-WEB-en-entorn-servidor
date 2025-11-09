<?php
include("header.php");
include("sesion.php");
include("cerrarsesion.php");

$conexion = new mysqli('localhost', 'discografia', 'discografia', 'discografia');

$consulta = "SELECT codigo, titulo FROM album";
$respuesta = $conexion->query($consulta);

$filas = $respuesta->fetch_all();

if (isset($_GET['info'])) {
        print "<script>alert('".$_GET['info']."')</script>";

}

print "<ul>";
foreach ($filas as $valor) {

        print "<li><a href='album.php?cod=".$valor[0]."'>Album: ".$valor[1]."</li>";

}
print "</ul>";

print "<button><a href='albumnuevo.php'>Crear Album</button>";
print "<button><a href='canciones.php'>Buscar Canciones</button>";


?>