<?php

namespace App\Http\Controllers;

use App\Models\ProyectoTarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyectoTareaController extends Controller
{
    /**
     * Display a listing of the resource proyectotarea.
     */
    public function index()
    {
        $vwproyectotareas = DB::table('vwproyectotareas')
            ->select('vwproyectotareas.*')
            ->get();
        return view('proyecto_tarea.index', ['vwproyectotareas' => $vwproyectotareas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vwproyectotarea.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Guarda los cambios de paqute
        //El codigo de la vwproyectotarea es autoincremental
        $vwproyectotarea = new ProyectoTarea();
        $vwproyectotarea->titulo = $request->titulo;
        $vwproyectotarea->descripcion = $request->descripcion;
        $vwproyectotarea->estado = $request->estado;
        $vwproyectotarea->save();
        $vwproyectotareas = DB::table('vwproyectotareas')
            ->select('vwproyectotareas.*')
            ->get();
        return view('proyecto_tarea.index', ['vwproyectotareas' => $vwproyectotareas]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_proyecto)
    {
        $id_proyecto = 1;
        $vwproyectotareas = DB::table('vwproyectotareas')
        ->select('vwproyectotareas.*')
        ->where('vwproyectotareas.id_proyecto', $id_proyecto)
        ->get();
    return view('proyecto_tarea.index', ['vwproyectotareas' => $vwproyectotareas]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vwproyectotarea = ProyectoTarea::find($id);
        return view('proyecto_tarea.edit', ['vwproyectotarea' => $vwproyectotarea]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vwproyectotarea = ProyectoTarea::find($id);
        $vwproyectotarea->titulo = $request->titulo;
        $vwproyectotarea->descripcion = $request->descripcion;
        $vwproyectotarea->estado = $request->estado;
        $vwproyectotarea->save();
        $vwproyectotareas = DB::table('vwproyectotareas')
            ->select('vwproyectotareas.*')
            ->get();
        return view('proyecto_tarea.index', ['vwproyectotareas' => $vwproyectotareas]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vwproyectotarea = ProyectoTarea::find($id);
        $vwproyectotarea->delete();
        $vwproyectotareas = DB::table('vwproyectotareas')
            ->select('vwproyectotareas.*')
            ->get();
        return view('proyecto_tarea.index', ['vwproyectotareas' => $vwproyectotareas]);
    }
}
