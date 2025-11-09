<?php
if (isset($_COOKIE['User'])) {
    $username = $_COOKIE['User'];
    $imagePath = "img/users/" . $username . "/idUserSmall.png";
    print'<header>
        <img src="'.htmlspecialchars($imagePath).'" alt="Foto de perfil" width="72" height="96">
        <span>'. htmlspecialchars($username).'</span>
    </header>';
}
?>
