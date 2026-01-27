<x-app-layout>
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h1>Añadir película</h1>

            <form method="POST"
                  action="{{ route('pelicula.store') }}"
                  enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Título</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Año</label>
                    <input type="number" name="year" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Director</label>
                    <input type="text" name="director" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="4" required></textarea>
                </div>

                <button class="btn btn-primary">Guardar</button>
            </form>

        </div>
    </div>
</x-app-layout>
