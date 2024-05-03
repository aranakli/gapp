<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Editar Proyecto</title>
</head>


<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Proyectos') }}
            </h2>
        </x-slot>
        <div class="container">
            <h1>Editar Proyecto</h1>
            <form method="POST" action="{{ route('proyectos.update', ['proyecto' => $proyecto->comu_codi]) }}">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="id" class="p-1 text-gray-900 dark:text-gray-100">Código {{ $proyecto->id }}</label>
                    <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id"
                        disabled="disabled" value="{{ $proyecto->id }}">
                    <div id="idHelp" class="p-1 text-gray-900 dark:text-gray-100">Código del proyecto</div>
                </div>
                <div class="mb-3">
                    <label for="titulo" class="p-1 text-gray-900 dark:text-gray-100">Proyecto</label>
                    <input type="text" require class="form-control" id="titulo" aria-describedby="nameHelp"
                        name="titulo" placeholder="Titulo del proyecto" value="{{ $proyecto->titulo }}">
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="p-1 text-gray-900 dark:text-gray-100">Descripción</label>
                    <input type="text" require class="form-control" id="descripcion" aria-describedby="nameHelp"
                        name="descripcion" placeholder="Descripcion del proyecto" value="{{ $proyecto->descripcion }}">
                </div>
                <select class="form-select" aria-label="Default select example">
                    <option selected>{{ $proyecto->estado }}</option>
                    <option value="Borrador">Borrador</option>
                    <option value="Activo">Activo</option>
                    <option value="Cancelado">Cancelado</option>
                    <option value="En espera">En espera</option>
                    <option value="Archivado">Archivado</option>
                  </select>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('proyectos.index') }}" class="btn btn-warning">Cancelar</a>
                </div>
            </form>
        </div>
    </x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
