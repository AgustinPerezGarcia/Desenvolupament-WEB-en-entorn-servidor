@extends('layouts.master')
@section('content')
<div class="row">
    @foreach($pelis as $key => $pelicula)
        <div class="col-xs-6 col-sm-4 col-md-3 text-center" style="margin-top: 5vh;">
            <a href="{{ url('/catalog/show/' . $pelicula->id) }}">
                <img src="{{$pelicula->poster}}" style="width: 100%; height:50vh" />
                <span style="min-height:45px;margin:5px 0 10px 0">
                    {{$pelicula->title}}
                </span>
            </a>
        </div>
    @endforeach
</div>
@stop