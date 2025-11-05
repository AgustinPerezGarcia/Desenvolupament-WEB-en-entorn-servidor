<?php
include("sesion.php");
include("cerrarsesion.php");

$conexion = new mysqli('localhost', 'discografia', 'discografia', 'discografia');

$terminoBusqueda = trim($_POST['terminoBusqueda'] ?? '');
$campoBusqueda = $_POST['campoBusqueda'] ?? 'ambos';
$filtroGenero = $_POST['filtroGenero'] ?? 'Todos';

$listaGeneros = ['Todos','Acustica','BSO','Blues','Folk','Jazz','New age','Pop','Rock','Electronica'];

print "<h1>Búsqueda de canciones</h1>";

print '<form method="POST" action="#">';
print '<p>Texto a buscar: ';
print '<input type="text" name="terminoBusqueda" value="'.htmlspecialchars($terminoBusqueda).'"></p>';

print '<p>Buscar en: ';
print '<label><input type="radio" name="campoBusqueda" value="cancion"> Canciones</label> ';
print '<label><input type="radio" name="campoBusqueda" value="album"> Álbumes</label> ';
print '<label><input type="radio" name="campoBusqueda" value="ambos"> Ambos</label>';
print '</p>';

print '<p>Género musical: <select name="filtroGenero">';
foreach ($listaGeneros as $genero) {
    print "<option value=\"$genero\" >$genero</option>";
}
print '</select></p>';

print '<p><input type="submit" value="Buscar"></p>';
print '</form>';

if ($terminoBusqueda !== '') {

    $sql = "SELECT c.titulo AS tituloCancion, a.titulo AS tituloAlbum, c.posicion, c.duracion, c.genero
            FROM cancion c
            JOIN album a ON c.album = a.codigo
            WHERE 1=1";

    $valores = [];
    $tipos = '';

    if ($campoBusqueda === 'cancion') {
        $sql .= " AND c.titulo LIKE ?";
        $valores[] = "%$terminoBusqueda%";
        $tipos .= 's';
    } elseif ($campoBusqueda === 'album') {
        $sql .= " AND a.titulo LIKE ?";
        $valores[] = "%$terminoBusqueda%";
        $tipos .= 's';
    } else {
        $sql .= " AND (c.titulo LIKE ? OR a.titulo LIKE ?)";
        $valores[] = "%$terminoBusqueda%";
        $valores[] = "%$terminoBusqueda%";
        $tipos .= 'ss';
    }

    if ($filtroGenero !== 'Todos') {
        $sql .= " AND c.genero = ?";
        $valores[] = $filtroGenero;
        $tipos .= 's';
    }

    $sql .= " ORDER BY a.titulo, c.posicion";

    $consulta = $conexion->prepare($sql);
    if ($valores) {
        $consulta->bind_param($tipos, ...$valores);
    }
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0) {
        print "<ul>";
        while ($fila = $resultado->fetch_assoc()) {
            print "<li>";
            print "Canción: " . htmlspecialchars($fila['tituloCancion']);
            print " | Álbum: " . htmlspecialchars($fila['tituloAlbum']);
            print " | Posición: " . (int)$fila['posicion'];
            print " | Duración: " . htmlspecialchars($fila['duracion']);
            print " | Género: " . htmlspecialchars($fila['genero']);
            print "</li>";
        }
        print "</ul>";
    } else {
        print "<p>No se encontraron canciones que coincidan con la búsqueda.</p>";
    }

    $consulta->close();
}

$conexion->close();
?>
