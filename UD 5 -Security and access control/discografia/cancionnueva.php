<?php

    $conexion = new mysqli('localhost', 'discografia', 'discografia', 'discografia');

    $consulta = 'SELECT titulo FROM album where codigo = '.$_GET['cod'];

    $ultimaPosicion = 'SELECT posicion FROM cancion where album = '.$_GET['cod'].' order by posicion';


    $respuestaUltimaPosicion = $conexion->query($ultimaPosicion);
    $posicionArray = $respuestaUltimaPosicion->fetch_all();

    foreach ($posicionArray as $key => $value) {
        $posicion = $value[0]+1;
    }

    $respuesta = $conexion->query($consulta);
    $filas = $respuesta->fetch_all();

    print "<h1>".$filas[0][0]."</h1>";

    ponerForm();

    if (isset($_POST['nueva'])) {
        $conexion->autocommit(false);

        try {
            $duracion = sprintf("%02d:%02d:%02d", $_POST['hora'], $_POST['minuto'], $_POST['segundo']);

            $sql = "INSERT INTO cancion (titulo, album, posicion, duracion, genero) VALUES ('".$_POST['nueva']."', ".$_GET['cod'].", $posicion, '$duracion', '".$_POST['genero']."')";
            
            $todo_bien = $conexion->query($sql);
            if(!$todo_bien){
                throw new Exception('Error Insert', 1);
            }else {
                print "<script>alert('Se ha añadido la cancion')</script>";
            } ;
        
            
            $conexion->commit();

        } catch (Exception $e) {
            $conexion->rollback();
            print_r($e);
        }
    }


    function ponerForm(){

    print ' <form action="#" method="post">
    
                <p>Nueva Cancion: <input type="text" name="nueva" id="nueva" required> <p>

                <p>Horas: <input style="width: 50px" type="number" name="hora" id="hora" min="0" required> Minutos: <input type="number" name="minuto" id="minuto" min="0" max="59" required> Segundos: <input type="number" name="segundo" id="segundo" min="0" max="59" required></p>

                <p>Género musical:
                    <select name="genero" id="genero" required>
                        <option value="Rock">Rock</option>
                        <option value="Pop">Pop</option>
                        <option value="Jazz">Jazz</option>
                        <option value="Metal">Metal</option>
                        <option value="Clasica">Clásica</option>
                    </select>
                </p>
               
                <input type="submit">

            </form>';

    }


?>