<x-app-layout>
    <div class="row">
        <div class="col-sm-4">
            <img src="{{ asset('storage/peliculas/' . $peli->foto) }}">
        </div>

        <div class="col-sm-8">
            <h1>{{ $peli->nombre }}</h1>

            <h3>Año: {{ $peli->year }}</h3>
            <h3>Director: {{ $peli->director }}</h3>

            <br>

            <p>
                <strong>Resumen</strong>: {{ $peli->descripcion }}
            </p>

            <br>

            <p>
                <strong>Estado</strong>:
                @if ($peli->alquiler)
                    Película actualmente <strong>alquilada</strong>.
                @else
                    Película actualmente <strong>NO</strong> alquilada.
                @endif
            </p>

            <div class="d-flex gap-2 mt-3">
                {{-- TOGGLE alquiler --}}
                <form method="POST" action="{{ route('catalog.toggle', $peli->id) }}">
                    @csrf
                    @method('PUT')

                    @if ($peli->alquiler)
                        <button class="btn btn-danger">Devolver película</button>
                    @else
                        <button class="btn btn-primary">Alquilar película</button>
                    @endif
                </form>

                <a href="{{ route('catalogo.edit', $peli->id) }}" class="btn btn-warning">
                    Editar película
                </a>

                <a href="{{ route('catalogo.index') }}" class="btn btn-light">
                    Volver al listado
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
