<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        table, td, th {
            border: 1px solid #000000;
            border-collapse: collapse;
            padding: 2px;
            padding-left: 5px;
        }

    </style>
  
    
    <header>

        <?php

            include_once("./cabecera.inc.php")

        ?>

    </header>    
    
    <table>
    <?php

        foreach ($_SERVER as $clave => $valor) {
            echo "<tr><td>".$clave."</td><td>".$valor."</td</tr>";
        }

    ?>
    </table>

    <footer>

        <?php
        
            include_once("./footer.inc.php")
        
        ?>

    </footer>
  
</body>
</html>