<x-app-layout>
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h1 class="mb-4">Editar película</h1>

            <form method="POST"
                  action="{{ route('update.pelicula', $peli->id) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Título</label>
                    <input
                        type="text"
                        name="nombre"
                        class="form-control"
                        value="{{ old('nombre', $peli->nombre) }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Año</label>
                    <input
                        type="number"
                        name="year"
                        class="form-control"
                        value="{{ old('year', $peli->year) }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Director</label>
                    <input
                        type="text"
                        name="director"
                        class="form-control"
                        value="{{ old('director', $peli->director) }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto actual</label><br>
                    <img
                        src="{{ asset('storage/peliculas/' . $peli->foto) }}"
                        class="img-fluid mb-2"
                        style="max-height: 200px;"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Nueva foto (opcional)</label>
                    <input
                        type="file"
                        name="foto"
                        class="form-control"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea
                        name="descripcion"
                        class="form-control"
                        rows="5"
                        required
                    >{{ old('descripcion', $peli->descripcion) }}</textarea>
                </div>

                <button class="btn btn-primary">
                    Guardar cambios
                </button>

                <a href="{{ route('catalogo.show', $peli->id) }}"
                   class="btn btn-secondary">
                    Cancelar
                </a>
            </form>

        </div>
    </div>
</x-app-layout>
