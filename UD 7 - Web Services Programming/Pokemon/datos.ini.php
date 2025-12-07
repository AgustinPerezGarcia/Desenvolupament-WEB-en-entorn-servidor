<?php

include('llamada.php');

function llamadaRegion($id){ 
    switch ($id) {
        case 1: return [llamada('pokedex/2')]; break;      // Kanto
        case 2: return [llamada('pokedex/7')]; break;      // Johto
        case 3: return [llamada('pokedex/4')]; break;      // Hoenn
        case 4: return [llamada('pokedex/6')]; break;      // Sinnoh
        case 5: return [llamada('pokedex/8')]; break;      // Unova
        case 6: return [llamada('pokedex/12'), llamada('pokedex/13'), llamada('pokedex/14')]; break; // Kalos
        case 7: return [llamada('pokedex/21')]; break;     // Alola
        case 8: return [llamada('pokedex/27')]; break;     // Galar
        case 9: return [llamada('pokedex/31')]; break;     // Paldea
    }
}

function nombreRegion($id){
        switch($id){
        case 1: return "Kanto"; break;
        case 2: return "Johto"; break;
        case 3: return "Hoenn"; break;
        case 4: return "Sinnoh"; break;
        case 5: return "Unova"; break;
        case 6: return "Kalos"; break;
        case 7: return "Alola"; break;
        case 8: return "Galar"; break;
        case 9: return "Paldea"; break;
    }
}

function mostrarListaPokemons($id, $region){

    $pokemon = llamadaRegion($id);

    $nombreRegion = nombreRegion($id);

    echo '<h1>Región: '.$nombreRegion.'</h1>';

    echo '<table id="tabla">';

    $contador = 0;

    foreach ($pokemon as $pokemonF) {
        foreach ($pokemonF['pokemon_entries'] as $entrie) {

            if ($contador % 5 == 0) echo '<tr>';

            $name = $entrie['pokemon_species']['name'];

            echo '<td><a href="infopokemon.php?name=' . $name . '">'
                . $name .
                '</a></td>';

            $contador++;

            if ($contador % 5 == 0) echo '</tr>';
        }
    }

    if ($contador % 5 != 0) echo '</tr>';

    echo '</table>';

}

function mostrarInfoPokemon($name){

    $info = llamada('pokemon/'.$name);

    echo '<div id="pokemon">';

    echo '<h1>'.$info['forms'][0]['name'].'</h1>';

    echo '<img width="150px" src="'.$info['sprites']['other']['home']['front_default'].'">';

    echo '<table id="tabla">';

    $contador = 0;

    foreach ($info['types'] as $value) {

        $tipo = llamada('type/'.$value['type']['name']);

        foreach ($tipo['names'] as $idioma) {
            if ($idioma['language']['name'] == 'es') {

                if ($contador % 5 == 0) echo '<tr>';

                echo '<td>'.$idioma['name'].'</td>';

                $contador++;

                if ($contador % 5 == 0) echo '</tr>';
            }
        }
    }

    if ($contador % 5 != 0) echo '</tr>';

    echo '</table>';

    echo '<p>Peso: '.$info['weight'].' KG</p>';
    echo '</div>';

}

function formularioBusqueda(){

    $type = llamada('type?limit=22');

    echo '<form action="#" method="post">
            <input type="text" id="nombre" name="nombre" placeholder="Pokemon">
            
            <select id="tipo" name="tipo">
                <option value="">Tipo</option>';

    foreach ($type['results'] as $value) {

        $tipo = llamada('type/'.$value['name']);

        foreach ($tipo['names'] as $idioma) {
            if ($idioma['language']['name'] == 'es') {
                echo '<option value="'.$value['name'].'">'.$idioma['name'].'</option>';
            }
        }
    }

    echo '<option value="shadow">Sombra</option>
        </select>

        <select id="region" name="region">
            <option value="">Region</option>
            <option value="1">Kanto</option>
            <option value="2">Johto</option>
            <option value="3">Hoenn</option>
            <option value="4">Sinnoh</option>
            <option value="5">Unova</option>
            <option value="6">Kalos</option>
            <option value="7">Alola</option>
            <option value="8">Galar</option>
            <option value="9">Paldea</option>
        </select>

        <button type="submit">Enviar</button>
    </form>';
}

function busquedaTipo($tipoBuscado) {

    $data = llamada('type/' . $tipoBuscado);

    $nombreTipoEs = $tipoBuscado;
    foreach ($data['names'] as $nombre) {
        if ($nombre['language']['name'] == 'es') {
            $nombreTipoEs = $nombre['name'];
            break;
        }
    }

    echo '<h1>Tipo: ' . $nombreTipoEs . '</h1>';

    echo '<table id="tabla">';

    $contador = 0;

    foreach ($data['pokemon'] as $p) {

        if ($contador % 5 == 0) echo '<tr>';

        $name = $p['pokemon']['name'];

        echo '<td><a href="infopokemon.php?name=' . $name . '">' 
            . $name . 
            '</a></td>';

        $contador++;

        if ($contador % 5 == 0) echo '</tr>';
    }

    if ($contador % 5 != 0) echo '</tr>';

    echo '</table>';
}

function busquedaTipoRegion($tipo, $region){

    $data = llamada('type/'.$tipo);
    $regiones = llamadaRegion($region);

    $nombreTipoEs = $tipo;
    foreach ($data['names'] as $nombre) {
        if ($nombre['language']['name'] == 'es') {
            $nombreTipoEs = $nombre['name'];
            break;
        }
    }

    $nombreRegion = nombreRegion($region);

    echo '<h1>Tipo: '.$nombreTipoEs.' | Región: '.$nombreRegion.'</h1>';

    echo '<table id="tabla">';

    $contador = 0;

    $porTipo = [];
    foreach($data['pokemon'] as $p){
        $porTipo[] = $p['pokemon']['name'];
    }

    foreach($regiones as $lista){
        foreach($lista['pokemon_entries'] as $entrie){

            $name = $entrie['pokemon_species']['name'];

            if(in_array($name, $porTipo)){

                if ($contador % 5 == 0) echo '<tr>';

                echo '<td><a href="infopokemon.php?name=' . $name . '">' 
                    . $name . 
                    '</a></td>';

                $contador++;

                if ($contador % 5 == 0) echo '</tr>';
            }
        }
    }

    if ($contador % 5 != 0) echo '</tr>';

    echo '</table>';
}

function resultadoBusqueda($nombre, $tipo, $region){

    // Nada
    if ($nombre == '' && $tipo == '' && $region == '') {
        echo '<h1><span id="faltanArgs">Introduce un campo.</span></h1>';
        formularioBusqueda();
        return;
    }

    // Nombre
    if ($nombre != '' && $tipo == '' && $region == '') {
        mostrarInfoPokemon($nombre);
        return;
    }

    // Tipo
    if ($nombre == '' && $tipo != '' && $region == '') {
        busquedaTipo($tipo);
        return;
    }

    // Región
    if ($nombre == '' && $tipo == '' && $region != '') {
        mostrarListaPokemons($region, $region);
        return;
    }

    // Nombre + tipo
    if ($nombre != '' && $tipo != '' && $region == '') {
        mostrarInfoPokemon($nombre);
        return;
    }

    // Nombre + región
    if ($nombre != '' && $tipo == '' && $region != '') {
        mostrarInfoPokemon($nombre);
        return;
    }

    // Tipo + región
    if ($nombre == '' && $tipo != '' && $region != '') {
        busquedaTipoRegion($tipo, $region);
        return;
    }

    // Todo
    if ($nombre != '' && $tipo != '' && $region != '') {
        mostrarInfoPokemon($nombre);
        return;
    }
}

?>
