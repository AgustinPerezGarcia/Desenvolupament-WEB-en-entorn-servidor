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
        Película actualmente <strong>alquilada</strong>.
    @else
        Película actualmente <strong>NO</strong> alquilada.
    @endif
</p>

<div class="d-flex gap-2">
    {{-- TOGGLE rented --}}
    <form method="POST" action="{{ route('catalog.toggle', $peli->id) }}">
        @csrf
        @method('PUT')

        @if ($peli->rented)
            <button class="btn btn-danger">Devolver película</button>
        @else
            <button class="btn btn-primary">Alquilar película</button>
        @endif
    </form>

    <a href="{{ route('catalog.edit', $peli->id) }}" class="btn btn-warning">
        Editar película
    </a>

    <a href="{{ route('catalog.index') }}" class="btn btn-light">
        Volver al listado
    </a>
</div>


    </div>
</div>
@stop