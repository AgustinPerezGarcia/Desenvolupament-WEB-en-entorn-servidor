<?php
    $json_data = file_get_contents("./marvel_characters.json");
    $json_decod = json_decode($json_data, true);
    
    print "<table border=1px>";
    foreach ($json_decod as $personaje) {
        print "<tr><td>".$personaje['name']."<td>";
        foreach ($personaje['comics']['items'] as $item) {
                print $item['name']."<br>";
        }
        print "<td>";
    }
    print"</table>";
?>