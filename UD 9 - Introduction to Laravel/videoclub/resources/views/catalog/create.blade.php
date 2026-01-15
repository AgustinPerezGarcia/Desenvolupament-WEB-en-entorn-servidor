@extends('layouts.master')
@section('content')
<form method="POST" action="{{ url('/catalog') }}">
    @csrf

    <div>
        <label for="title">Título</label><br>
        <input
            type="text"
            name="title"
            id="title"
            value="{{ old('title') }}">
    </div>

    <br>

    <div>
        <label for="year">Año</label><br>
        <input
            type="number"
            name="year"
            id="year"
            value="{{ old('year') }}">
    </div>

    <br>

    <div>
        <label for="director">Director</label><br>
        <input
            type="text"
            name="director"
            id="director"
            value="{{ old('director') }}">
    </div>

    <br>

    <div>
        <label for="poster">Poster (URL)</label><br>
        <input
            type="text"
            name="poster"
            id="poster"
            value="{{ old('poster') }}">
    </div>

    <br>

    <div>
        <label for="synopsis">Sinopsis</label><br>
        <textarea name="synopsis" id="synopsis" rows="6" cols="50">{{ old('synopsis') }}</textarea>
    </div>

    <br>

    <button type="submit">Añadir película</button>
</form>


@stop