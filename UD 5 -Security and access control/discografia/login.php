<?php

$conexion = new mysqli('localhost', 'discografia', 'discografia', 'discografia');

if (isset($_COOKIE['User'])) {
    print "<p>Quieres loguearte con ".$_COOKIE['User']."?</p>";

    print ' <form action="#" method="post">
                <input type="submit" name="boton" value="Si">        
                <input type="submit" name="boton" value="No">        
            </form>        
    ';

    if (isset($_POST['boton'])) {
        if ($_POST['boton'] == "Si") {
            print "Has Iniciado con ".$_COOKIE['User'];
        } else {
            setcookie('User',"",-1);
            header("Location: login.php");
        }
        
    }
    

}else{
    $consulta = "SELECT usuario, password from tabla_usuarios";

    $respuesta = $conexion->query($consulta);
    $usuario = $respuesta->fetch_all();

    foreach ($usuario as $key => $value) {
        $user = $value[0];
        $password = $value[1];
        
    }

    print ' <form action="#" method="post">
        
                Usuario:<p><input type="text" name="user" required></p>

                Constraseña:<p><input type="password" name="pwd" required></p>

                    <input type="submit">

            </form>';

    if (isset($_POST['user'])) {
        if (password_verify($_POST['pwd'], $password) && $user == $_POST['user']) {
            print 'Ha iniciado sesión';
            setcookie('User', $user, time()+3600);
    } else {
            print 'No ha iniciado sesión';
        }
    }
}
?>