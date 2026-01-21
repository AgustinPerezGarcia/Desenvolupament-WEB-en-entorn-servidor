<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Pelicula;

class CatalogController
{
    /**
     * Display a listing of the resource.
     */
    public function getIndex(): View
    {
		$peliculas = Pelicula::all();
		return view('catalog.index', ['pelis' => $peliculas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getCreate(): View
    {
		return view('catalog.create');
    }

    /**
     * Display the specified resource.
     */
    public function getShow(string $id): View
    {
	    $pelicula = Pelicula::findOrFail($id);
        return view('catalog.show', ['peli' => $pelicula]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function getEdit(string $id): View{
		  $peliculas = Pelicula::findOrFail($id);
      return view('catalog.edit', ['peli' => $peliculas]);
    }

}
