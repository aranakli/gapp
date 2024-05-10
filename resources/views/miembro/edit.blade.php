<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Miembro</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Miembros') }}
            </h2>
        </x-slot>
        <div class="container">
            <h1>Editar Miembro</h1>
            <form method="POST" action="{{ route('miembro.update', ['miembros' => $miembro->id]) }}">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="codigo" class="form-label">Código</label>
                    <input type="text" class="form-control" id="id" aria-describedby="codigoHelp"
                        name="id" disabled="disabled" value="{{ $miembro->id }}">
                    <div id="codigoHelp" class="form-text">Código Miembro</div>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" required class="form-control" id="nombre" name="nombre"
                        placeholder="Document miembro" value="{{ $miembro->nombre }}">
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" required class="form-control" id="apellido" name="apellido"
                        placeholder="First name miembro" value="{{ $miembro->apellido }}">
                </div>
                <div class="mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <input type="text" required class="form-control" id="bio" name="bio"
                        placeholder="Last name miembro" value="{{ $miembro->bio }}">
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="number" required class="form-control" id="telefono" name="telefono"
                        placeholder="Telefono miembro" min="1" max="9147483647" value="{{ $miembro->telefono }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" required class="form-control" id="email" name="email"
                        placeholder="Email miembro" value="{{ $miembro->email }}">
                </div>

                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <input type="hidden" required class="form-control" id="estado" name="estado"
                        placeholder="Estado miembro" value="{{ $miembro->estado }}">
                </div>
                <?php
                // Obtener el valor de $miembro->estado
                $estado = $miembro->estado;
                // Verificar si cada opción está incluida
                $hab = strpos($estado, '0') !== false ? 'checked' : '';
                $deshab = strpos($estado, '1') !== false ? 'checked' : '';

                ?>

                <div class="form-check">
                    <input class="form-check-input" type="radio" value="0" id="estado1" name="estado"
                        onclick="guardarCheckbox()" {{ $hab }}>
                    <label class="form-check-label" for="estado1">
                        Habilitado
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="1" id="estado2" name="estado"
                        onclick="guardarCheckbox()" {{ $deshab }}>
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
                <!-- Despliegue de cheqkbox -->


                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('miembro.index') }}" class="btn btn-warning">Cancelar</a>
                </div>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    </x-app-layout>
</body>

</html>
