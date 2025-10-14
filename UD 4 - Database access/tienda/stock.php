<?php
var_dump($_POST);


$conexion = new mysqli('localhost', 'user', 'user', 'tienda');

$consulta = "SELECT p.nombre_corto, s.unidades, t.nombre, t.cod FROM producto p JOIN stock s ON p.cod = s.producto JOIN tienda t ON t.cod = s.tienda where p.cod like '".$_GET["cod"]."'";
$respuesta = $conexion->query($consulta);

$filas = $respuesta->fetch_all();
var_dump($filas);

print "<h1>Stock del producto ".$filas[0][0]." en las tiendas:</h1>";

print "<form name='actualizar' action='#' method='post'>";
//print "<ul>";
$cont = 0;
foreach ($filas as $key => $valor) {

    print "<li>Tienda ".$valor[2].":<input name='".$cont."' type='number' style='width:40px' value='".$valor[1]."'>unidades</li>";
    $cont++;
}
//print "</ul>";

print "<input type='submit' value='Actualizar'>";

print "</form>";


$conexion->autocommit(false);

try {
    for ($i=0; $i < $cont ; $i++) { 
        $sql = "UPDATE stock SET unidades=".$_POST[$i]." WHERE producto LIKE '".$_GET['cod']."' and tienda =".$filas[$i][3]; 
    }
    
    $todo_bien = $conexion->query($sql);
    if(!$todo_bien) throw new Exception('Error update', 1);
    
    $conexion->commit();

} catch (Exception $e) {
    $conexion->rollback();
    print_r($e);
}

?>