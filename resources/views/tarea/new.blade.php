<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Agregar relación proyecto/miembro</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tarea') }}
            </h2>
        </x-slot>
        <div class="container">
            <form method="POST" action="{{ route('tareas.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="id" class="form-label">Id</label>
                    <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id"
                        disabled="disabled">
                    <div id="idHelp" class="form-text">Id</div>
                </div>

                <label for="titulo">Título Proyecto</label>
                <select class="form-select" id="titulo" name="titulo" required>
                    <option selected disabled value="">Elegir uno...</option>
                    @foreach ($proyectos as $proyecto)
                        <option value="{{ $proyecto->id }}">{{ $proyecto->titulo }}</option>
                    @endforeach
                </select>

                <label for="miembro">Nombre Miembro</label>
                <select class="form-select" id="miembro" name="miembro" required>
                    <option selected disabled value="">Elegir uno...</option>
                    @foreach ($miembros as $miembro)
                        <option value="{{ $miembro->id }}">{{ $miembro->nombre }}</option>
                    @endforeach
                </select>
                <div>
                    <label for="nombre" class="from-label">Nombre de la tarea</label>
                    <input type="text" required class="form-control" id="nombre" aria-describedby="nameHelp"
                        placeholder="Nombre de la tarea" name="nombre">
                </div>
                <div>
                    <label for="descripcion" class="from-label">Descripción</label>
                    <input type="text" required class="form-control" id="descripcion" aria-describedby="nameHelp"
                        placeholder="Descripción de la tarea" name="descripcion">
                </div>
                <div>
                    <label for="fecInicio" class="from-label">Fecha Inicio</label>
                    <input type="date" required class="form-control" id="fecInicio" aria-describedby="nameHelp"
                        placeholder="Fecha de inicio de la tarea" name="fecInicio">
                </div>
                <div>
                    <label for="fecFinEstimada" class="from-label">Fecha Finalizacion Estimada</label>
                    <input type="date" required class="form-control" id="fecFinEstimada" aria-describedby="nameHelp"
                        placeholder="Fecha de finalización estimada de la tarea" name="fecFinEstimada">
                </div>
                <div>
                    <label for="fecFinReal" class="from-label">Fecha Finalizacion Real</label>
                    <input type="date" class="form-control" id="fecFinReal" aria-describedby="nameHelp"
                        placeholder="Fecha de finalización real de la tarea" name="fecFinReal">
                </div>
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-select" name="estado">
                        <option selected>Seleccione el estado de la tarea</option>
                        <option value="Borrador">Borrador</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Atrasado">Atrasado</option>
                        <option value="No empezar">No empezar</option>
                        <option value="Activo">Activo</option>
                        <option value="Prioridad">Prioridad</option>
                        <option value="Cancelado">Cancelado</option>
                    </select>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('tareas.index') }}" class="btn btn-warning">Cancel</a>
                </div>
            </form>
        </div>
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
</x-app-layout>
