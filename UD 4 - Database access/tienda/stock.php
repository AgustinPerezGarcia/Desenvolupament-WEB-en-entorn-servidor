<?php

$conexion = new mysqli('localhost', 'user', 'user', 'tienda');

$conexion->autocommit(false);


if(isset($_POST["tiendas"][0])){

$nTiendas = $_POST["tiendas"][0];

try {
    for ($i=0; $i < $nTiendas ; $i++) { 
        $sql = "UPDATE stock SET unidades=".$_POST["unidades"][$i]." WHERE producto LIKE '".$_GET['cod']."' and tienda = ".$_POST["tienda"][$i]; 

        $todo_bien = $conexion->query($sql);
        if(!$todo_bien) throw new Exception('Error update', 1);
    }
       
    $conexion->commit();

} catch (Exception $e) {
    $conexion->rollback();
    print_r($e);
}

}

$consulta = "SELECT p.nombre_corto, s.unidades, t.nombre, t.cod FROM producto p JOIN stock s ON p.cod = s.producto JOIN tienda t ON t.cod = s.tienda where p.cod like '".$_GET["cod"]."'";

$respuesta = $conexion->query($consulta);

$filas = $respuesta->fetch_all();

//var_dump($filas);

$cont = 0;

print "<h1>Stock del producto ".$filas[0][0]." en las tiendas:</h1>";

print "<form name='actualizar' action='#' method='post'>";
//print "<ul>";
foreach ($filas as $key => $valor) {

    print "<li>Tienda ".$valor[2].":<input name='unidades[".$cont."]' type='number' style='width:40px' value='".$valor[1]."'>unidades</li>";

    print "<input type='hidden' name='tienda[".$cont."]' value='".$valor[3]."'>";

    $cont++;
}
//print "</ul>";

print "<input type='hidden' name='tiendas' value='".$cont."'>";

print "<input type='submit' value='Actualizar'>";

print "</form>";

print "<a href='index.php'><button>Volver a home</button></a>";



?>