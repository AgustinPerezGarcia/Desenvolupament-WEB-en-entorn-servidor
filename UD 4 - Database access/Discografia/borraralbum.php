<?php
include("sesion.php");
include("cerrarsesion.php");

$conexion = new mysqli('localhost', 'discografia', 'discografia', 'discografia');

$conexion->begin_transaction();


try {
    $borrarCanciones = $conexion->prepare("DELETE FROM cancion WHERE album = ?");
    $borrarCanciones->bind_param("i", $_GET['cod']);
    $borrarCanciones->execute();

    $borrarAlbum = $conexion->prepare("DELETE FROM album WHERE codigo = ?");
    $borrarAlbum->bind_param("i", $_GET['cod']);
    $borrarAlbum->execute();

    if ($borrarAlbum->affected_rows === 0) {
        throw new Exception("El álbum no existe o ya fue eliminado");
    }

    $conexion->commit();

    header("Location: index.php?mensaje=Álbum borrado correctamente");
    exit;

} catch (Exception $e) {
    $conexion->rollback();
    header("Location: index.php?mensaje=" . urlencode("Error: " . $e->getMessage()));
    exit;
}
?>
