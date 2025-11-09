<?php
include("header.php");
include("sesion.php");
include("cerrarsesion.php");

    $conexion = new mysqli('localhost', 'discografia', 'discografia', 'discografia');

    $consulta = 'SELECT * FROM cancion where album = '.$_GET['cod'].' order by posicion asc';

    $album = 'SELECT titulo FROM album where codigo = '.$_GET['cod'];

    $respuesta = $conexion->query($consulta);
    $filas = $respuesta->fetch_all();
    
    $respuestaAlbum = $conexion->query($album);
    $filasAlbum = $respuestaAlbum->fetch_all();

    print "<h1>".$filasAlbum[0][0]."</h1>";

    print "<ul>";
    foreach ($filas as $valor) {
        print "<li>Nombre: ".$valor[0]."</li>";
    }
    print "</ul>";

    print "<button><a href='cancionnueva.php?cod=".$_GET['cod']."'>Añadir Cancion</button>";
    print "<button><a href='borraralbum.php?cod=".$_GET['cod']."'>Borrar Album</button>";

?>