<?php

    $conexion = new mysqli('localhost', 'discografia', 'discografia', 'discografia');

    $consulta = 'SELECT * FROM cancion where album = '.$_GET['cod'].' order by posicion asc';

    $respuesta = $conexion->query($consulta);
    $filas = $respuesta->fetch_all();

    print "<ul>";
    foreach ($filas as $valor) {
        print "<li>Nombre: ".$valor[0]."</li>";
    }
    print "</ul>";

    print "<button><a href='cancionnueva.php?cod=".$_GET['cod']."'>Añadir Cancion</button>";
    print "<button><a href='borraralbum.php?cod=".$_GET['cod']."'>Borrar Album</button>";

?>