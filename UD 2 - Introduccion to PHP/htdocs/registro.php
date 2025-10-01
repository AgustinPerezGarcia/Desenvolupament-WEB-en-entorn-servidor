<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
   
        include_once("./cabecera.inc.php");
    
                        echo '<form name="input" action="#" method="post" autocomplete="off">';                
                            if (empty($_POST['nombre'])) {
                                                                echo '<p>Nombre: <input type="text" name="nombre" id="nombre"></p>';
                            }else {
                                echo '<p>Nombre: <input type="text" value="'.$_POST['nombre'].'" name="nombre" id="nombre"></p>';
                            }                            
                            if (empty($_POST['apellido'])) {
                                                                echo '<p>Apellido: <input type="text" name="apellido" id="apellido"></p>';
                            }else {
                                echo '<p>Apellido: <input type="text" value="'.$_POST['apellido'].'" name="apellido" id="apellido"></p>';
                            }
                            if (empty($_POST['user'])) {
                                                                echo '<p>Nombre de Usuario: <input type="text" name="user" id="user"></p>';
                            }else {
                                echo '<p>Nombre de Usuario: <input type="text" value="'.$_POST['user'].'" name="user" id="user"></p>';
                            }
                            if (empty($_POST['pwd'])) {
                                                                echo '<p>Contraseña: <input type="password" name="pwd" id="pwd" ></p>';
                            }else {
                                echo '<p>Contraseña: <input type="password" value="'.$_POST['pwd'].'" name="pwd" id="pwd" ></p>';
                            }
                            if (empty($_POST['pwd2'])) {
                                                                echo '<p>Confirme la contraseña: <input type="password" name="pwd2" id="pwd2" ></p>';
                            }else {
                                echo '<p>Confirme la contraseña: <input type="password" value="'.$_POST['pwd2'].'" name="pwd2" id="pwd2" ></p>';
                            }
                            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
                                echo '<p>Correo: <input type="text" name="mail" id="mail"></p>';
                            }else{
                                echo '<p>Correo: <input type="text" value="'.$_POST['mail'].'" name="mail" id="mail"></p>';
                            }
                            '
    <p>Contraseña: <input type="password" name="pwd" id="pwd" ></p>
                <p>Confirme la contraseña: <input type="password" name="pwd2" id="pwd2" ></p>

                <p>Correo: <input type="text" name="mail" id="mail" ></p>
                <p>Fecha de nacimiento? <input type="date" name="fecha" id="fecha"></p>

                <p> Genero? </p>
                    <p> Hombre <input type="radio" name="genero" value="hombre"> </p>
                    <p> Mujer <input type="radio" name="genero" value="mujer"> </p>

                <p> Condiciones:</p>
                    <p> Acepta las condiciones de uso <input type="checkbox" name="aceptar[]" value="uso"></p>
                    <p> Acepta que te enviemos correos <input type="checkbox" name="aceptar[]" value="correo"></p>


                ';echo'<p><input type="submit" value="Enviar formulario"></p>   

            </form> ';

        
         
        include_once("./footer.inc.php");
    
    ?>
</body>
</html>