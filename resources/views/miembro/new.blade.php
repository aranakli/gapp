<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Agregar nuevo Miembro</title>
  </head>
  <body>
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Miembros') }}
        </h2>
    </x-slot>
    <div class="container">
    <h1>Agregar Miembro</h1>
    <form method="POST" action="{{ route('miembro.store') }}">
        @csrf
        <!--id	nombre	apellido	bio	telefono	email	estado -->
        <div class="mb-3">
        <label for="id" class="form-label">Código</label>
        <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id"
        disabled="disabled">
        <div id="idHelp" class="form-text">Código Miembro</div>
        </div>
        <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" required class="form-control" id="nombre" aria-describedby="nameHelp" name="nombre"
        placeholder="Nombre miembro">
        </div>
        <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" required class="form-control" id="apellido" aria-describedby="nameHelp" name="apellido"
        placeholder="Apellido miembro">
        </div>
        <div class="mb-3">
        <label for="bio" class="form-label">Bio</label>
        <input type="text" required class="form-control" id="bio" aria-describedby="nameHelp" name="bio"
        placeholder="Bio miembro">
        </div>
        <div class="mb-3">
        <label for="telefono" class="form-label">Telefono</label>
        <input type="number" required class="form-control" id="telefono" aria-describedby="nameHelp" name="telefono"
        placeholder="Telefono miembro" min="1" max="9147483647" >
        </div>
        <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" required class="form-control" id="email" aria-describedby="nameHelp" name="email"
        placeholder="Email miembro">
        </div>
        <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <input type="text" required class="form-control" id="estado" aria-describedby="nameHelp" name="estado"
        placeholder="Estado">
        </div>
        
        <div class="mt-3">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('miembro.index') }}" class="btn btn-warning">Cancelar</a>
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
