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

    public function postCreate(Request $request){
        $pelicula = new Pelicula();

        $pelicula->title = $request->title;
        $pelicula->year = $request->year;
        $pelicula->director = $request->director;
        $pelicula->poster = $request->poster;
        $pelicula->rented = false;
        $pelicula->synopsis = $request->synopsis;

        $pelicula->save();

        return redirect('/catalog');
    }
    
    public function putEdit(Request $request, $id){
        $pelicula = Pelicula::findOrFail($id);

        $pelicula->title = $request->title;
        $pelicula->year = $request->year;
        $pelicula->director = $request->director;
        $pelicula->poster = $request->poster;
        $pelicula->synopsis = $request->synopsis;

        $pelicula->save();

        return redirect('/catalog/show/'.$id);
    }

    public function toggleRented($id)
    {
        $pelicula = Pelicula::findOrFail($id);

        $pelicula->rented = !$pelicula->rented;
        $pelicula->save();

        return redirect('/catalog/show/' . $id);
    }


}
