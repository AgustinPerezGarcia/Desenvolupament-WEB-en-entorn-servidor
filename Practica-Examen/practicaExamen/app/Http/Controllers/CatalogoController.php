<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Str;

class CatalogoController extends Controller
{
    public function getIndex(): View
    {
		$peliculas = Pelicula::all();
		return view('catalogo.index', ['pelis' => $peliculas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getCreate(): View
    {
		return view('catalogo.create');
    }

    /**
     * Display the specified resource.
     */
    public function getShow(int $id): View
    {
	    $pelicula = Pelicula::findOrFail($id);
        return view('catalogo.show', ['peli' => $pelicula]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function getEdit(int $id): View{
		$peliculas = Pelicula::findOrFail($id);
        return view('catalogo.edit', ['peli' => $peliculas]);
    }

    public function postCreate(Request $request)
    {
        // Guardar imagen
        $nombreFoto = Str::uuid() . '.' . $request->foto->extension();
        $request->foto->storeAs('peliculas', $nombreFoto, 'public');

        $pelicula = new Pelicula();

        $pelicula->nombre = $request->nombre;
        $pelicula->year = $request->year;
        $pelicula->director = $request->director;
        $pelicula->foto = $nombreFoto;
        $pelicula->alquiler = false;
        $pelicula->descripcion = $request->descripcion;

        $pelicula->save();

        return redirect('/catalogo');
    
    }
   
    public function putUpdate(Request $request, $id)
    {

        $pelicula = Pelicula::findOrFail($id);

        if ($request->hasFile('foto')) {

            // borrar la antigua
            Storage::disk('public')->delete('peliculas/' . $pelicula->foto);

            // guardar la nueva
            $nombreFoto = Str::uuid() . '.' . $request->foto->extension();
            $request->foto->storeAs('peliculas', $nombreFoto, 'public');

            $pelicula->foto = $nombreFoto;
        }

        $pelicula->nombre = $request->nombre;
        $pelicula->year = $request->year;
        $pelicula->director = $request->director;
        $pelicula->descripcion = $request->descripcion;

        $pelicula->save();

        return redirect('/catalogo/show/'. $id);
    
    }

    public function toggleRented($id)
    {
        $pelicula = Pelicula::findOrFail($id);

        $pelicula->alquiler = !$pelicula->alquiler;
        $pelicula->save();

        return redirect('/catalogo/show/' . $id);
    }

}
