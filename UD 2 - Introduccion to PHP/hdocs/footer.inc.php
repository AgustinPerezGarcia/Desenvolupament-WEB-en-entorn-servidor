<?php
date_default_timezone_set('Europe/Madrid');


$fraseDia = "";

switch (date("w")) {
    case 0:
        $fraseDia = $fraseDia."Domingo, ";
        break;
    
    case 1:
        $fraseDia = $fraseDia."Lunes, ";
        break;
    
    case 2:
        $fraseDia = $fraseDia."Martes, ";
        break;
    
    case 3:
        $fraseDia = $fraseDia."Miercoles, ";
        break;
    
    case 4:
        $fraseDia = $fraseDia."Jueves, ";
        break;
    
    case 5:
        $fraseDia = $fraseDia."Viernes, ";
        break;
    
    case 6:
        $fraseDia = $fraseDia."Sabado, ";
        break;
    
}

$fraseDia = $fraseDia.date("d");

switch (date("n")) {    
    case 1:
        $fraseDia = $fraseDia." de enero de ";
        break;
    
    case 2:
        $fraseDia = $fraseDia." de febrero de ";
        break;
    
    case 3:
        $fraseDia = $fraseDia." de marzo de ";
        break;
    
    case 4:
        $fraseDia = $fraseDia." de abril de ";
        break;
    
    case 5:
        $fraseDia = $fraseDia." de mayo de ";
        break;
    
    case 6:
        $fraseDia = $fraseDia." de junio de ";
        break;    
        
    case 7:
        $fraseDia = $fraseDia." de julio de ";
        break;
    
    case 8:
        $fraseDia = $fraseDia." de agosto de ";
        break;
    
    case 9:
        $fraseDia = $fraseDia." de septiebre de ";
        break;
    
    case 10:
        $fraseDia = $fraseDia." de octubre de ";
        break;
    
    case 11:
        $fraseDia = $fraseDia." de noviembre de ";
        break;
    
    case 12:
        $fraseDia = $fraseDia." de diciembre de ";
        break;
}

$fraseDia = $fraseDia.date("Y");

echo "<p>".$fraseDia."</p>";

?>