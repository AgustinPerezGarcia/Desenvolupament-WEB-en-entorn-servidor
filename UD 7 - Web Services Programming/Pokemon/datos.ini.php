<?php

include('llamada.php');

function mostrarListaPokemons($id, $region){
    $pokemon = "";
switch ($id) {
    case 1://kanto
        $pokemon = [llamada('pokedex/2')];
        break;
    case 2://johto
        $pokemon = [llamada('pokedex/7')];
        break;
    case 3://hoenn
        $pokemon = [llamada('pokedex/4')];
        break;
    case 4://sinnoh
        $pokemon = [llamada('pokedex/6')];
        break;
    case 5://unova
        $pokemon = [llamada('pokedex/8')];
        break;
    case 6://kalos
        $pokemon = [llamada('pokedex/12'), llamada('pokedex/13'), llamada('pokedex/14'),];
        break;
    case 7://alola
        $pokemon = [llamada('pokedex/21')];
        break;
    case 8://galar
        $pokemon = [llamada('pokedex/27')];
        break;
    case 9://paldea
        $pokemon = [llamada('pokedex/31')];
        break;
}

    echo '<h1>Estas en '.$region.'</h1>';

    echo '<table id="tabla">';

    $contador = 0;

    foreach ($pokemon as $key => $pokemonF) {
        foreach ($pokemonF['pokemon_entries'] as $entrie) {

            if ($contador % 5 == 0) echo '<tr>';

            echo '<td><a href="infopokemon.php?name=' . $entrie['pokemon_species']['name'] . '">'
                . $entrie['pokemon_species']['name'] .
                '</a></td>';

            $contador++;

            if ($contador % 5 == 0) echo '</tr>';
        }
    }

    echo '</table>';

}

function mostrarInfoPokemon($name){
    $info = llamada('pokemon/'.$name);
    //var_dump($info);
    echo '<div id="pokemon">';

    echo '<h1>'.$info['forms'][0]['name'].'</h1>';

    echo '<img width="150px" src="'.$info['sprites']['other']['home']['front_default'].'">';

    echo '<table id="tabla">';

    $contador = 0;

    foreach ($info['types'] as $key => $value) {
        $tipo = llamada('type/'.$value['type']['name']);
        
        foreach ($tipo['names'] as $key => $idioma) {
            if ($idioma['language']['name'] == 'es') {

                if ($contador % 5 == 0) {
                    echo '<tr>';
                }

                echo '<td>' . $idioma['name'] . '</td>';

                $contador++;

                if ($contador % 5 == 0) {
                    echo '</tr>';
                }
            }
        }
    }

    if ($contador % 5 != 0) {
        echo '</tr>';
    }

    echo '</table>';

    echo '<p>'.$info['weight'].' KG</p>';
    echo '</div>';

}

?>