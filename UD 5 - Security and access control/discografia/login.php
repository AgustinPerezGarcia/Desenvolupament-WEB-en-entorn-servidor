<?php

$conexion = new mysqli('localhost', 'discografia', 'discografia', 'discografia');

if (isset($_COOKIE['User'])) {
    print "<p>Quieres loguearte con ".$_COOKIE['User']."?</p>";

    print ' <form action="#" method="get">
                <input type="submit" name="boton" value="Si">        
                <input type="submit" name="boton" value="No">        
            </form>        
    ';

    if (isset($_GET['boton'])) {
        if ($_GET['boton'] == "Si") {
            sesion($_COOKIE['User']);
        } else {
            setcookie('User',"",-1);
            header("Location: login.php");
        }
        
    }

}else{

    $consulta = "SELECT usuario, password from tabla_usuarios";

    $respuesta = $conexion->query($consulta);
    $usuario = $respuesta->fetch_all();

    print ' <form action="#" method="post">
        
                Usuario:<p><input type="text" name="user" required></p>

                Constraseña:<p><input type="password" name="pwd" required></p>

                    <input type="submit">

            </form>
            
            <button><a href="registro.php">Nuevo Usuario</a></button>';

    if (isset($_POST['user'])) {
        $user = "";
        $password = "";

        foreach ($usuario as $key => $value) {
            if ($value[0] == $_POST['user'] ) {
                $user = $value[0];
                $password = $value[1];
            }
        }    
        if (password_verify($_POST['pwd'], $password) && $user == $_POST['user']) {
            sesion($user);
        } else {
            print '<p>No ha iniciado sesión</p>';
        }
    }
}

function sesion($user){
    ini_set('session.name', 'miSesion');
    ini_set('session.cookie_httponly', 1);
    session_start();
    $_SESSION['usuario'] = $user;
    setcookie('User', $user, time()+3600);
    header("Location: index.php");
    exit;    
}
?>