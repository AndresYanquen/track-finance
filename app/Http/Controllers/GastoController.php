<?php
// app/Http/Controllers/GastoController.php

namespace App\Http\Controllers;

use App\Models\Gasto;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Gasto::query();
    
        // Filtrar por categoría si está presente en el request
        if ($request->has('categoria_id') && $request->categoria_id) {
            $query->where('categoria_id', $request->categoria_id);
        }
    
        $gastos = $query->with(['usuario', 'categoria'])->paginate(10); // Paginar resultados
        $categorias = Categoria::all(); // Para popular el filtro
    
        return view('gastos.index', compact('gastos', 'categorias'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $usuarios = User::all();
        return view('gastos.create', compact('categorias', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request);
        $validatedData = $request->validate([
            'categoria_id' => 'required|exists:categoria,id',
            'descripcion' => 'nullable|string',
            'monto' => 'required|numeric',
        ]);

        Gasto::create([
            'user_id' => auth()->id(), // Aquí asignamos el ID del usuario autenticado
            'categoria_id' => $validatedData['categoria_id'],
            'descripcion' => $validatedData['descripcion'],
            'monto' => $validatedData['monto'],
            'fecha' => now(),
        ]);

        return redirect()->route('gastos.index')->with('success', 'Gasto created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gasto $gasto)
    {
        return view('gastos.show', compact('gasto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gasto $gasto)
    {
        $categorias = Categoria::all();
        $usuarios = User::all();
        return view('gastos.edit', compact('gasto', 'categorias', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gasto $gasto)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'categoria_id' => 'required|exists:categoria,id',
            'descripcion' => 'nullable|string',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
        ]);

        $gasto->update($request->all());

        return redirect()->route('gastos.index')->with('success', 'Gasto updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gasto $gasto)
    {
        $gasto->delete();

        return redirect()->route('gastos.index')->with('success', 'Gasto deleted successfully!');
    }
}
