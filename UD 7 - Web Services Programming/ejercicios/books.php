<?php
    $xml=simplexml_load_file("books.xml");
    foreach($xml->children() as $books) {
        if ($books['category'] == 'web') {
            print "Autor: ".$books->title;
            print " - Precio: ".$books->price;
            print "<br>";
        } 
    }
?>