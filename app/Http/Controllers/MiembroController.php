<?php

namespace App\Http\Controllers;

use App\Models\Miembro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MiembroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $miembros = DB::table('miembros')
            ->select('miembros.*')
            ->get();
        return view('miembro.index', ['miembros' => $miembros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('miembro.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $miembro = new Miembro();
        // $miembro->id = $request->id;
        // El código de miembro es auto incremental
        $miembro->nombre = $request->nombre;
        $miembro->apellido = $request->apellido;
        $miembro->bio = $request->bio;
        $miembro->telefono = $request->telefono;
        $miembro->email = $request->email;
        $miembro->estado = $request->estado;
        $miembro->save();

        $miembros = DB::table('miembros')
            ->select('miembros.*')
            ->get();
        return view('miembro.index', ['miembros' => $miembros]);
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
    public function edit($id)
    {
        $miembro = Miembro::find($id);
        return view('miembro.edit', ['miembro' => $miembro]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $miembro = Miembro::find($id);
        $miembro->nombre = $request->nombre;
        $miembro->apellido = $request->apellido;
        $miembro->bio = $request->bio;
        $miembro->telefono = $request->telefono;
        $miembro->email = $request->email;
        $miembro->estado = $request->estado;
        $miembro->save();
        $miembros = DB::table('miembros')
            ->select('miembros.*')
            ->get();
        return view('miembro.index', ['miembros' => $miembros]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
            $miembro = Miembro::find($id);
            $miembro->delete();

            $miembros = DB::table('miembros')
                ->select('miembros.*')
                ->get();
            return view('miembro.index', ['miembros' => $miembros]);
        
    }
}
