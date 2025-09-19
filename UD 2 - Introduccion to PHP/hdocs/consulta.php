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

        foreach ($_POST['modulo'] as $key => $value) {

            echo "<p>".$value."</p>";
        }
         
        include_once("./footer.inc.php");
    
    ?>
</body>
</html>