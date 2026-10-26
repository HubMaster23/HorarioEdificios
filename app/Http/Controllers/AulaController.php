<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aulas = Aula::all();


        return view('aula.listado', compact('aulas'));
        return "muestra todas las aulas";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

//       return "que me muestre un formulario";
        return view("aula.agregar");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $aula = new Aula();
        $aula->nombre = $request->input('nombre');
        $aula->capacidad = $request->input('capacidad');
        $aula->wifi = $request->has('wifi');
        $aula->save();

        return redirect(route('aulas.listar'));
    }

    /**
     * Display the specified resource.
     */
    public function show($x)
    {
        return "mostrare la aula $x";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($cual)
    {
        $aula = Aula::find($cual);
//        echo "cual modificar";
        return view("aula.modificar",compact('aula'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $x)
    {
        $anterior = Aula::find($x);
        $anterior->nombre = $request->input('nombre');
        $anterior->capacidad = $request->input('capacidad');
        $anterior->wifi = $request->has('wifi');
        $anterior->save();

        return redirect(route('aulas.listar'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($x)
    {
        $anterior = Aula::find($x);
        $anterior->delete();

        return redirect(route('aulas.listar'));
    }
}