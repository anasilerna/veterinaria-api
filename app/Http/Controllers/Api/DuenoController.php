<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dueno;
use Illuminate\Http\Request;

class DuenoController extends Controller
{
    public function index()
    {
        $duenos = Dueno::all();
        return response()->json($duenos);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'animal_id' => 'required|exists:animals,id'
        ]);

        $dueno = Dueno::create($validated);
        return response()->json($dueno, 201);
    }

    public function show(string $id)
    {
        $dueno = Dueno::find($id);

        if (!$dueno) {
            return response()->json(['message' => 'Dueno no encontrado'], 404);
        }

        return response()->json($dueno);
    }

    public function update(Request $request, string $id)
    {
        $dueno = Dueno::find($id);

        if (!$dueno) {
            return response()->json(['message' => 'Dueno no encontrado'], 404);
        }

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'animal_id' => 'required|exists:animals,id'
        ]);

        $dueno->update($validated);
        return response()->json($dueno);
    }

    public function destroy(string $id)
    {
        $dueno = Dueno::find($id);

        if (!$dueno) {
            return response()->json(['message' => 'Dueno no encontrado'], 404);
        }

        if ($dueno->animal) {
            $dueno->animal->delete();
        }

        $dueno->delete();
        return response()->json(['message' => 'Dueno eliminado']);
    }
}
