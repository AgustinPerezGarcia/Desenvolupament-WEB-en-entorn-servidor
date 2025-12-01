<?php

function llamada($valor){
    $ch = curl_init(); //se inicia sesión
    $url = 'https://pokeapi.co/api/v2/'.$valor;
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL,$url); //se configura la url
    $json_data = curl_exec($ch); //se accede al servicio
    curl_close($ch); //se cierra sesión
    $json_decod = json_decode($json_data, true);
    return $json_decod;

}

?>