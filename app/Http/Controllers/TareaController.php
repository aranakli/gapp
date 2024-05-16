<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource tareas.
     */
    public function index()
    {
        $tareas = DB::table('tareas')
            ->join('miembros', 'tareas.id_miembro', '=', 'miembros.id')
            ->join('proyectos', 'tareas.id_proyecto', '=', 'proyectos.id')
            ->select('tareas.*', 'miembros.nombre as miembro', 'proyectos.titulo')
            ->get();
        return view('tarea.index', ['tareas'=>$tareas]);
    }

    /**
     * Show the form for creating a new resource tarea.
     */
    public function create()
    {
        $miembros = DB::table('miembros')
        ->orderBy('nombre')
        ->get();

        $proyectos = DB::table('proyectos')
        ->orderBy('titulo')
        ->get();

        return view('tarea.new', ['miembros' => $miembros], ['proyectos' => $proyectos]);
    }

    /**
     * Store a newly created resource in storage tareas.
     */
    public function store(Request $request)
    {
        $tarea = new Tarea();
        $tarea->id_proyecto = $request->titulo;
        $tarea->id_miembro = $request->miembro;
        $tarea->nombre = $request->nombre;
        $tarea->descripcion = $request->descripcion;
        $tarea->fecha_inicio = $request->fecInicio;
        $tarea->fecha_fin_estimada = $request->fecFinEstimada;
        $tarea->fecha_fin_real = $request->fecFinReal;
        $tarea->estado = $request->estado;
        $tarea->save();

        $tareas = DB::table('tareas')
            ->join('proyectos', 'tareas.id_proyecto', '=', 'proyectos.id')
            ->join('miembros', 'tareas.id_miembro', '=', 'miembros.id')
            ->select('tareas.*', 'miembros.nombre as miembro', 'proyectos.titulo')
            ->get();
        return view('tarea.index', ['tareas'=>$tareas]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource tareas.
     */
    public function edit(string $id)
    {
        $tarea= Tarea::find($id);
        $miembros = DB::table('miembros')
        ->orderBy('nombre')
        ->get();

        $proyectos = DB::table('proyectos')
        ->orderBy('titulo')
        ->get();

        return view('tarea.edit', ['tarea' => $tarea, 'miembros' => $miembros, 'proyectos' => $proyectos]);

    }

    /**
     * Update the specified resource in storage tareas.
     */
    public function update(Request $request, $id)
    {
        $tarea= Tarea::find($id);
        $tarea->id_proyecto = $request->titulo;
        $tarea->id_miembro = $request->miembro;
        $tarea->nombre = $request->nombre;
        $tarea->descripcion = $request->descripcion;
        $tarea->fecha_inicio = $request->fecInicio;
        $tarea->fecha_fin_estimada = $request->fecFinEstimada;
        $tarea->fecha_fin_real = $request->fecFinReal;
        $tarea->estado = $request->estado;
        $tarea->save();
        $tareas = DB::table('tareas')
            ->join('proyectos', 'tareas.id_proyecto', '=', 'proyectos.id')
            ->join('miembros', 'tareas.id_miembro', '=', 'miembros.id')
            ->select('tareas.*', 'miembros.nombre as miembro', 'proyectos.titulo')
            ->get();
        return view('tarea.index', ['tareas' => $tareas]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tarea= Tarea::find($id);
        $tarea->delete();

        $tareas = DB::table('tareas')
            ->join('miembros', 'tareas.id_miembro', '=', 'miembros.id')
            ->join('proyectos', 'tareas.id_proyecto', '=', 'proyectos.id')
            ->select('tareas.*', 'miembros.nombre', 'proyectos.titulo')
            ->get();
        return view('tarea.index', ['tareas' => $tareas]);
    }
}
