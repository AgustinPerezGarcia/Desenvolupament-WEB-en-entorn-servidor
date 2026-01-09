<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function () {
    return 'Hello world';
});

Route::get('/user/{id}', function (string $id){
    return 'User '.$id;
});

Route::get('/table/{number}', function ($number){
    for ($i=1; $i <= 10; $i++) { 
        echo "$i * $number = ". $i * $number . "<br>";
    }
})->where('number', '[0-9]+');

Route::get('/', function(){
    return view('home', array('nombre'=>'Dani'));
});

Route::get('/', function () {
return view('greeting', ['name' => 'Dani']);
});