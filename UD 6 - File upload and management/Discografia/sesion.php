<?php
ini_set('session.name', 'miSesion');
ini_set('session.cookie_httponly', 1);

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$username = $_COOKIE['User'];
$imgSmall = "img/users/$username/idUserSmall.png";
$imgBig   = "img/users/$username/idUserBig.png";

?>