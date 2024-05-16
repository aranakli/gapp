<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>GAPP - Proyectos - Tareas</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Proyectos - Tareas') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <a href="{{ route('dashboard') }}"
                            class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded ml-2">Regresar</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id Proyecto</th>
                                    <th scope="col">Titulo Proyecto</th>
                                    <th scope="col">Id Tarea</th>
                                    <th scope="col">Nombre tarea</th>
                                    <th scope="col">Fecha de Inicio</th>
                                    <th scope="col">Fecha de Fin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vwproyectotareas as $vwproyectotarea)
                                    <tr>
                                        <th scope="row">{{ $vwproyectotarea->proyecto }}</th>
                                        <td>{{ $vwproyectotarea->titulo }}</td>
                                        <td>{{ $vwproyectotarea->id }}</td>
                                        <td>{{ $vwproyectotarea->nombre }}</td>
                                        <td>{{ $vwproyectotarea->fecha_inicio }}</td>
                                        <td>{{ $vwproyectotarea->fecha_fin_real }}</td>
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
