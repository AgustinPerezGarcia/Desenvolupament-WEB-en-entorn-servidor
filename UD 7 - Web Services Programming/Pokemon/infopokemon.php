<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>    <?php print $_GET['name'];?></title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
    <?php include('datos.ini.php'); ?>

</head>
<body>
    <?php
 
include('header.php');

echo "<div></div>";

include('nav.php');

echo "<div></div>";

echo '<div id="iniciales">';
   mostrarInfoPokemon($_GET['name']);
echo '</div>';

echo '<div class="abajo"></div>';

include('footer.php');

?>
</body>
</html>