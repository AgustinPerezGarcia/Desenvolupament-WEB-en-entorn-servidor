<?php
var_dump($_POST);


$conexion = new mysqli('localhost', 'user', 'user', 'tienda');

$consulta = "SELECT p.nombre_corto, s.unidades, t.nombre, t.cod FROM producto p JOIN stock s ON p.cod = s.producto JOIN tienda t ON t.cod = s.tienda where p.cod like '".$_GET["cod"]."'";
$respuesta = $conexion->query($consulta);

$filas = $respuesta->fetch_all();

print "<h1>Stock del producto ".$filas[0][0]." en las tiendas:</h1>";

print "<form name='actualizar' action='stock.php' method='post'>";
//print "<ul>";
foreach ($filas as $key => $valor) {

    print "Tienda ".$valor[2].":<input name='".$valor[3]."' type='number' style='width:40px' value='".$valor[1]."'>unidades";

}
//print "</ul>";

print "<input type='submit' value='Actualizar'>";

print "</form>";


?>