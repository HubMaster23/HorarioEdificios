<?php

namespace App\Http\Controllers;

use App\Models\Edificio;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EdificioController extends Controller
{
    /**
     * GET /api/edificios
     * Lista todos los edificios con sus aulas.
     */
    public function index(): JsonResponse
    {
        $edificios = Edificio::with('aulas')->get();
        return response()->json($edificios);
    }

    /**
     * POST /api/edificios
     * Crea un edificio.
     */
    public function store(Request $request): JsonResponse
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $edificio = Edificio::create($datos);
        return response()->json($edificio, 201);
    }

    /**
     * GET /api/edificios/{edificio}
     * Muestra un edificio con sus aulas.
     */
    public function show(Edificio $edificio): JsonResponse
    {
        return response()->json($edificio->load('aulas'));
    }

    /**
     * PUT/PATCH /api/edificios/{edificio}
     * Actualiza un edificio.
     */
    public function update(Request $request, Edificio $edificio): JsonResponse
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $edificio->update($datos);
        return response()->json($edificio->load('aulas'));
    }

    /**
     * DELETE /api/edificios/{edificio}
     * Elimina un edificio (sus aulas quedan con edificio_id = null).
     */
    public function destroy(Edificio $edificio): JsonResponse
    {
        $edificio->delete();
        return response()->json($edificio);
    }

    /**
     * GET /api/edificios/{edificio}/aulas
     * Lista solo las aulas de un edificio.
     */
    public function aulas(Edificio $edificio): JsonResponse
    {
        return response()->json($edificio->aulas);
    }
}