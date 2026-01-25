@extends('layouts.master')
@section('content')
<form method="POST" action="{{ route('peli.update', $peli->id) }}">
    @csrf
    @method('PUT')

    <div>
        <label for="title">Modificar película</label><br>
        <input
            type="text"
            name="title"
            id="title"
            value="{{ $peli->title }}">
    </div>

    <br>

    <div>
        <label for="year">Año</label><br>
        <input
            type="number"
            name="year"
            id="year"
            value="{{ $peli->year }}">
    </div>

    <br>

    <div>
        <label for="director">Director</label><br>
        <input
            type="text"
            name="director"
            id="director"
            value="{{ $peli->director }}">
    </div>

    <br>

    <div>
        <label for="poster">Poster (URL)</label><br>
        <input
            type="text"
            name="poster"
            id="poster"
            value="{{ $peli->poster }}">
    </div>

    <br>

    <div>
        <label for="synopsis">Sinopsis</label><br>
        <textarea name="synopsis" id="synopsis" rows="6" cols="50">{{ $peli->synopsis }}</textarea>
    </div>

    <br>

    <button type="submit">Editar película</button>
</form>
@stop