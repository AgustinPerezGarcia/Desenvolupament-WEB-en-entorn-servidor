@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-sm-4">
        <img src="{{$peli->poster}}" width="100%">
    </div>
    <div class="col-sm-8">
            <h1>{{ $peli->title }}</h1>
            <h3>Año: {{$peli->year}}</h3>
            <h3>Director: {{ $peli->director }}</h3>
            <br>
            <p><strong>Resumen</strong>: {{ $peli->synopsis }}</p>
            <br>
            <p><strong>Estado</strong>: 
            @if ($peli->rented)
                Pelicula actualmente alquilada.</p>
                <button type="button" class="btn btn-danger">Devolver pelicula</button>
            @else
                Pelicula actualmente <strong>NO</strong> alquilada.</p>
                <button type="button" class="btn btn-primary">Alquilar pelicula</button>
            @endif
            <button type="button" class="btn btn-warning">Editar pelicula</button>
            <button type="button" class="btn btn-light">Volver al listado</button>
    </div>
</div>
@stop