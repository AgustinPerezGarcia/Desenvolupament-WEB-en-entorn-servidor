<?php
if (isset($_POST["cerrarsesion"])) {
    session_destroy();
    session_unset();
    header("Location: login.php"); 
    setcookie('User',"",0);
    exit();    

} 
print ' <form method="post">
        <button type="submit" name="cerrarsesion">Cerrar sesión</button>
        </form>'
?>
