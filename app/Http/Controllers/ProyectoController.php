<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\alert;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyectos = DB::table('proyectos')
            ->select('proyectos.*')
            ->get();
        return view('proyecto.index', ['proyectos' => $proyectos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proyecto.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Guarda los cambios de paqute
        //El codigo de la proyecto es autoincremental
        $proyecto = new Proyecto();
        $proyecto->titulo = $request->titulo;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->estado = $request->estado;
        $proyecto->save();
        $proyectos = DB::table('proyectos')
            ->select('proyectos.*')
            ->get();
        return view('proyecto.index', ['proyectos' => $proyectos]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proyecto = Proyecto::find($id);
        return view('proyecto.edit', ['proyecto' => $proyecto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proyecto = Proyecto::find($id);
        $proyecto->titulo = $request->titulo;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->estado = $request->estado;
        $proyecto->save();
        $proyectos = DB::table('proyectos')
            ->select('proyectos.*')
            ->get();
        return view('proyecto.index', ['proyectos' => $proyectos]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proyecto = Proyecto::find($id);
        $proyecto->delete();
        $proyectos = DB::table('proyectos')
            ->select('proyectos.*')
            ->get();
        return view('proyecto.index', ['proyectos' => $proyectos]);

        // try {
        //     // Elimina una proyecto
        //     $proyecto = Proyecto::find($id);
        //     $proyecto->delete();
        //     $proyectos = DB::table('proyectos')
        //         ->select('proyectos.*')
        //         ->get();
        //     return view('proyecto.index', ['proyectos' => $proyectos]);
        // } catch (\Exception $e) {
        //     if ($e->getCode() === '23000') {
        //         // Este código de error específico indica una violación de integridad referencial
        //         $proyectos = DB::table('proyectos')
        //             ->select('proyectos.*')
        //             ->get();
        //         return view('proyecto.index', ['proyectos' => $proyectos, 'error' => 'No se puede eliminar el proyecto debido a que existen tareas asociadas.']);
        //     } else {
        //         // Otros errores de la base de datos
        //         $proyectos = DB::table('proyectos')
        //             ->select('proyectos.*')
        //             ->get();
        //         return view('proyecto.index', ['proyectos' => $proyectos, 'error' => 'Error en la base de datos: ' . $e->getMessage()]);
        //     }
        // }
    }
}
