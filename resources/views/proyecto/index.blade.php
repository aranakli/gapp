<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>GAPP - Proyectos</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Proyectos') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <a href="{{ route('proyectos.create') }}"
                            class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded ml-2">Crear</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proyectos as $proyecto)
                                    <tr>
                                        <th scope="row">{{ $proyecto->id }}</th>
                                        <td>{{ $proyecto->titulo }}</td>
                                        <td>{{ $proyecto->descripcion }}</td>
                                        <td>{{ $proyecto->estado }}</td>

                                        <td>
                                            <a href="{{ route('proyectos.edit', ['proyecto' => $proyecto->id]) }}"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Editar </a></li>

                                            <form
                                                {{-- action="{{ route('proyectos.destroy', ['proyecto' => $proyecto->id]) }}"
                                                method='POST' style="display: inline-block">
                                                @method('delete')
                                                @csrf
                                                <input
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2"
                                                    type="submit" value="Borrar">
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
