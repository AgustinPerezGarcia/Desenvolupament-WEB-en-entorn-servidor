@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-sm-4">
        <img src="{{$peli['poster']}}">
    </div>
    <div class="col-sm-8">
            <h1>{{ $peli['title'] }}</h1>
            <h3>Año: {{$peli['year']}}</h3>
            <h3>Director: {{ $peli['director'] }}</h3>
            <br>
            <p><strong>Resumen</strong>: {{ $peli['synopsis'] }}</p>
            <br>
            <p><strong>Estado</strong>: 
            @if ($peli)
                Pelicula actualmente alquilada.
            @else
                Pelicula actialmente <strong>NO</strong> alquilada.
            @endif
            </p>
            <button type="button" class="btn btn-danger">Devolver pelicula</button>
            <button type="button" class="btn btn-warning">Editar pelicula</button>
            <button type="button" class="btn btn-light">Volver al listado</button>
    </div>
</div>
@stop