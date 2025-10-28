<?php

    $conexion = new mysqli('localhost', 'discografia', 'discografia', 'discografia');

    $ultimoAlbum = 'SELECT codigo FROM album order by codigo';


    $respuestaUltimoAlbum = $conexion->query($ultimoAlbum);
    $posicionArray = $respuestaUltimoAlbum->fetch_all();

    foreach ($posicionArray as $key => $value) {
        $posicion = $value[0]+1;
    }

    print "<h1>Nuevo Album</h1>";

    ponerForm();

    if (isset($_POST['titulo'])) {
        $conexion->autocommit(false);

        try {

            $sql = "INSERT INTO album (codigo, titulo, discografica, formato, fechaLanzamiento, fechaCompra, precio) VALUES ($posicion, '".$_POST['titulo']."', '".$_POST['discografica']."', '".$_POST['formato']."', ".$_POST['fechaLanzamiento'].", ".$_POST['fechaCompra'].", ".$_POST['precio'].")";
            
            $todo_bien = $conexion->query($sql);
            if(!$todo_bien){
                throw new Exception('Error Insert', 1);
            }else {
                header("Location: index.php?info=Album creado");

            }
        
            
            $conexion->commit();

        } catch (Exception $e) {
            $conexion->rollback();
            print($e);
        }
    }


    function ponerForm(){

    print ' <form action="#" method="post">
    
                <p>Título: <input type="text" name="titulo" required></p>
                <p>Discográfica: <input type="text" name="discografica" required></p>
                <p>Formato:
                    <select name="formato" required>
                        <option value="vinilo">Vinilo</option>
                        <option value="cd">CD</option>
                        <option value="dvd">DVD</option>
                        <option value="mp3">MP3</option>
                    </select>
                </p>
                <p>Fecha de lanzamiento: <input type="date" name="fechaLanzamiento"></p>
                <p>Fecha de compra: <input type="date" name="fechaCompra"></p>
                <p>Precio: <input type="number" step="0.01" name="precio"></p>
                <p><input type="submit"></p>

            </form>';

    }


?>