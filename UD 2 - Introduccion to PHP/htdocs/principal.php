<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal
    </title>
    
</head>
<body>
    <?php
        include_once("./cabecera.inc.php")
    ?>
    <nav>
        <a href="./tecnologias.php">Tecnologias</a>
    </nav>

    <section>

        <h2>Webs creadas</h2>

        <ul>
            <article><li><a href="https://www.wikipedia.org">WIKIPEDIA</a></li></article>
            <article><li><a href="https://www.apple.com">APPLE</a></li></article>
            <article><li><a href="https://www.strava.com">STRAVA</a></li></article>
        </ul>

    </section>

    <footer>
        
        <form name="input" action="./consulta.php" method="post">

            <p>Nombre: <input type="text" name="nombre" id="nombre"></p>
            <p>Apellidos: <input type="text" name="apellidos" id="apellidos" ></p>
            <p>Telefono: <input type="tel" name="telefono" id="telefono" ></p>
            <p>Correo: <input type="email" name="email" id="email" ></p>

            <p> Cuando es tu cumpleaños? <input type="date" name="fecha" id="fecha"></p>

            <p> A que clase vas? </p>
                <p> DAW <input type="radio" name="clase" value="DAW"> </p>
                <p> DAM <input type="radio" name="clase" value="DAM"> </p>
                <p> ASIX <input type="radio" name="clase" value="ASIX"> </p>

            <p> Que clases tienes?</p>
                <p> DWES <input type="checkbox" name="modulo[]" value="DWES"></p>
                <p> DWEC <input type="checkbox" name="modulo[]" value="DWEC"></p>
                <p> DAW <input type="checkbox" name="modulo[]" value="DAW"></p>
                <p> DIW <input type="checkbox" name="modulo[]" value="DIW"></p>
                <p> FOL <input type="checkbox" name="modulo[]" value="FOL"></p>

            Introduce un comentario:
            <p><textarea name="comentario" id="comentario"></textarea></p>

            <p><input type="reset" value="Borrar formulario"></p>
            <p><input type="submit" value="Enviar formulario"></p>   

        </form>

        <H3>Enviar mail</H3>
        <a href="mailto:agupergar@alu.edu.gva.es">Mail</a>

        <?php
            include_once("./footer.inc.php")
        ?>

    </footer>

</body>
</html>