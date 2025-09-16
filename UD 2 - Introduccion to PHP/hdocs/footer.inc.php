<?php
date_default_timezone_set('Europe/Madrid');


$fecha = ["mes" => [1 => "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"], "dSemana" => ["Domingo", "Lunes", "Martes", "Mieroles", "Jueves", "Viernes", "Sabado"]];

echo "<p>".$fecha["dSemana"][date("N")].", ".date("d")." de ".$fecha["mes"][date("n")]." de ".date("Y")."</p>";

?>