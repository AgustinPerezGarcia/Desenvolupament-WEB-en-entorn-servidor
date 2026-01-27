<x-app-layout>
    <div class="row justify-content-center">
        @foreach ($pelis as $pelicula)
            <div class="col-xs-6 col-sm-4 col-md-3 text-center" style="margin-top: 5vh;">
                <a href="{{ url('/catalogo/show/'. $pelicula->id) }}">
                    <img
                        src="{{ asset('storage/peliculas/' . $pelicula->foto) }}"
                        style="height:50vh"
                    />
                    <span style="min-height:45px; margin:5px 0 10px 0; display:block;">
                        {{ $pelicula->nombre }}
                    </span>
                </a>
            </div>
        @endforeach
    </div>
</x-app-layout>
