<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Agregar relación proyecto/miembro</title>
  </head>
  <body>
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proyecto / Miembro') }}
        </h2>
    </x-slot>
    <div class="container">
    <form method="POST" action="{{ route('proyecto_miembros.store') }}">
        @csrf
        <div class="mb-3">
        <label for="id" class="form-label">Código</label>
        <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id"
        disabled="disabled">
        <div id="idHelp" class="form-text">Código</div>
        </div>

        <label for="titulo">Título Proyecto</label>
        <select class="form-select" id="titulo" name="titulo" required>
            <option selected disabled value="">Elegir uno...</option>
            @foreach ($proyectos as $proyecto)
                <option value="{{ $proyecto->id }}">{{ $proyecto->titulo }}</option>
            @endforeach
        </select>

        <label for="nombre">Nombre Miembro</label>
        <select class="form-select" id="nombre" name="nombre" required>
            <option selected disabled value="">Elegir uno...</option>
            @foreach ($miembros as $miembro)
                <option value="{{ $miembro->id }}">{{ $miembro->nombre }}</option>

            @endforeach
        </select>

        <div class="mb-3">
                    <label for="rol" class="form-label">Rol</label>
                    <select class="form-select" name="rol">
                        <option selected>Seleccione el rol del miembro</option>
                        <option value="Gerente de Proyecto">Gerente de Proyecto</option>
                        <option value="Equipo de Proyecto">Equipo de Proyecto</option>
                        <option value="Analista de Negocio">Analista de Negocio</option>
                        <option value="Diseñador">Diseñador</option>
                        <option value="Desarrollador">Desarrollador</option>
                        <option value="Tester">Tester</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="area" class="form-label">Area Asignada</label>
                    <select class="form-select" name="area">
                        <option selected>Seleccione el area del miembro</option>
                        <option value="Financiero">Financiero</option>
                        <option value="Diseño">Diseño</option>
                        <option value="Programación">Programación</option>
                        <option value="Gestión de proyectos">Gestión de proyectos</option>
                        <option value="Operaciones">Operaciones</option>
                    </select>
                </div>

                <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <input type="hidden" required class="form-control" id="estado" aria-describedby="nameHelp" name="estado"
        value="0">
        </div>
        <div class="form-check">
    <input class="form-check-input" type="radio" value="0" id="estado1" name="estado" onclick="guardarCheckbox()" checked>
    <label class="form-check-label" for="estado1">
        Habilitado
    </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" value="1" id="estado2" name="estado" onclick="guardarCheckbox()">
    <label class="form-check-label" for="estado2">
        Deshabilitado
    </label>
</div>


<script>
    function guardarCheckbox() {
        var checkboxes = document.getElementsByClassName("form-check-input");
        var valoresSeleccionados = [];
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                valoresSeleccionados.push(checkboxes[i].value);
            }
        }
        document.getElementById("estado").value = valoresSeleccionados.join(', ');
    }

    function validarFormulario() {
        var estado = document.getElementById("estado").value;
        if (estado.trim() === "") {
            alert("ERROR. Debe seleccionar una opción en la habilitación de miembro.");
            return false; // Evita que el formulario se envíe
        }
        return true; // Permite que el formulario se envíe si el input "estado" no está vacío
    }
</script>

        <div class="mt-3">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('proyecto_miembros.index') }}" class="btn btn-warning">Cancel</a>
        </div>
</form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
</x-app-layout>
