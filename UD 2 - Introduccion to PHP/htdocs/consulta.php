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
    
        //var_dump($_POST); 

        echo "<p> Nombre: ".$_POST['nombre']."</p>";
        echo "<p> Apellidos: ".$_POST['apellidos']."</p>";
        echo "<p> Telefono: ".$_POST['telefono']."</p>";
        echo "<p> Correo: ".$_POST['email']."</p>";
        echo "<p> Date: ".$_POST['fecha']."</p>";
        echo "<p> Vas al curso: ".$_POST['clase']."</p>";
        echo "<p> Tienes estas clases: </p>";

        foreach ($_POST['modulo'] as $key => $value) {

            echo "<p>".$value."</p>";
        }

        echo "<p> Comentario: ".$_POST['comentario']."</p>";

         
        include_once("./footer.inc.php");
    
    ?>
</body>
</html>