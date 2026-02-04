<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $animales = Animal::all();
        return response()->json($animales);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|in:perro,gato,hamster,conejo',
            'peso' => 'nullable|numeric|min:0',
            'enfermedad' => 'nullable|string|max:255',
            'comentarios' => 'nullable|string'
        ]);

        $animal = Animal::create($validated);
        return response()->json($animal, 201);
    }

    public function show(string $id)
    {
        $animal = Animal::find($id);

        if (!$animal) {
            return response()->json(['message' => 'Animal no encontrado'], 404);
        }

        return response()->json($animal);
    }

    public function update(Request $request, string $id)
    {
        $animal = Animal::find($id);

        if (!$animal) {
            return response()->json(['message' => 'Animal no encontrado'], 404);
        }

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|in:perro,gato,hamster,conejo',
            'peso' => 'nullable|numeric|min:0',
            'enfermedad' => 'nullable|string|max:255',
            'comentarios' => 'nullable|string'
        ]);

        $animal->update($validated);
        return response()->json($animal);
    }

    public function destroy(string $id)
    {
        $animal = Animal::find($id);

        if (!$animal) {
            return response()->json(['message' => 'Animal no encontrado'], 404);
        }

        $animal->delete();
        return response()->json(['message' => 'Animal eliminado']);
    }
}
