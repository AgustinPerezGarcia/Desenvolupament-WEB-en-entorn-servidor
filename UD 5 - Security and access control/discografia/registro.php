<?php
    $conexion = new mysqli('localhost', 'discografia', 'discografia', 'discografia');

    ponerForm();

    $consulta = "Select id from tabla_usuarios order by 1 desc LIMIT 1";
    $respuesta = $conexion->query($consulta);

    $id = $respuesta->fetch_assoc();

    $conexion->autocommit(false);

    if (isset($_POST['nombre'])) {
        $conexion->autocommit(false);

        try {
            $sql = "INSERT INTO tabla_usuarios (id, usuario, password) VALUES ('" . ($id['id'] + 1) . "', '" . $_POST['nombre'] . "', '" . password_hash($_POST['password'], PASSWORD_BCRYPT) . "')";

            
            $todo_bien = $conexion->query($sql);
            if(!$todo_bien){
                throw new Exception('Error Insert', 1);
            }else {
                header("Location: login.php");
            } ;
        
            
            $conexion->commit();

        } catch (Exception $e) {
            $conexion->rollback();
            print_r($e);
        }
    }

    function ponerForm(){

    print ' <form action="#" method="post">
    
                <p>Usuario: <input type="text" name="nombre" id="nombre" required> <p>

                <p>Contraseña: <input type="password" name="password" id="password" required></p>
               
                <input type="submit">

            </form>';

    } 

?>