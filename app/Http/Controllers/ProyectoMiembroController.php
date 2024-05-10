<?php

namespace App\Http\Controllers;

use App\Models\ProyectoMiembro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyectoMiembroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$proyecto_miembro = ProyectoMiembro::all();
        $proyecto_miembros = DB::table('proyecto_miembros')
            ->join('miembros', 'proyecto_miembros.id_miembro', '=', 'miembros.id')
            ->join('proyectos', 'proyecto_miembros.id_proyecto', '=', 'proyectos.id')
            ->select('proyecto_miembros.*', 'miembros.nombre', 'proyectos.titulo')
            ->get();
        return view('proyecto_miembro.index', ['proyecto_miembros'=>$proyecto_miembros]);
    }


    public function create()
    {
        $miembros = DB::table('miembros')
        ->orderBy('nombre')
        ->get();

        $proyectos = DB::table('proyectos')
        ->orderBy('titulo')
        ->get();

        return view('proyecto_miembro.new', ['miembros' => $miembros], ['proyectos' => $proyectos]);



    }

    public function store(Request $request)
    {
        $proyecto_miembro = new ProyectoMiembro();
        //$proyecto_miembro->id = strtoupper($request->id);
        //id	id_proyecto	id_miembro	rol	areaAsignada	estado
        $proyecto_miembro->id_proyecto = $request->titulo;
        $proyecto_miembro->id_miembro = $request->nombre;
        $proyecto_miembro->rol = $request->rol;
        $proyecto_miembro->areaAsignada = $request->area;
        $proyecto_miembro->estado = $request->estado;
        $proyecto_miembro->save();

        $proyecto_miembros = DB::table('proyecto_miembros')
            ->join('proyectos', 'proyecto_miembros.id_proyecto', '=', 'proyectos.id')
            ->join('miembros', 'proyecto_miembros.id_miembro', '=', 'miembros.id')
            ->select('proyecto_miembros.*', 'miembros.nombre', 'proyectos.titulo')
            ->get();
        return view('proyecto_miembro.index', ['proyecto_miembros'=>$proyecto_miembros]);
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $proyecto_miembro= ProyectoMiembro::find($id);
        $miembros = DB::table('miembros')
        ->orderBy('nombre')
        ->get();

        $proyectos = DB::table('proyectos')
        ->orderBy('titulo')
        ->get();
        return view('proyecto_miembro.edit', ['proyecto_miembro' => $proyecto_miembro, 'miembros' => $miembros, 'proyectos' => $proyectos]);
    }

    public function update(Request $request, $id)
    {
        $proyecto_miembro= ProyectoMiembro::find($id);
//id	id_proyecto	id_miembro	rol	areaAsignada	estado
        $proyecto_miembro->id_proyecto = $request->titulo;
        $proyecto_miembro->id_miembro = $request->nombre;
        $proyecto_miembro->rol = $request->rol;
        $proyecto_miembro->areaAsignada = $request->area;
        $proyecto_miembro->estado = $request->estado;
        $proyecto_miembro->save();
        $proyecto_miembros = DB::table('proyecto_miembros')
            ->join('miembros', 'proyecto_miembros.id_miembro', '=', 'miembros.id')
            ->join('proyectos', 'proyecto_miembros.id_proyecto', '=', 'proyectos.id')
            ->select('proyecto_miembros.*', 'miembros.nombre', 'proyectos.titulo')
            ->get();
        return view('proyecto_miembro.index', ['proyecto_miembros' => $proyecto_miembros]);
    }

    public function destroy( $id)
    {
        $proyecto_miembro= ProyectoMiembro::find($id);
        $proyecto_miembro->delete();

        $proyecto_miembros = DB::table('proyecto_miembros')
            ->join('miembros', 'proyecto_miembros.id_miembro', '=', 'miembros.id')
            ->join('proyectos', 'proyecto_miembros.id_proyecto', '=', 'proyectos.id')
            ->select('proyecto_miembros.*', 'miembros.nombre', 'proyectos.titulo')
            ->get();
        return view('proyecto_miembro.index', ['proyecto_miembros' => $proyecto_miembros]);
    }
}
