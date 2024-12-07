<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all(); // Retrieve all categories
        return view('categorias.index', compact('categorias')); // Return view with categories
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create'); // Return view for creating a new category
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Validate the request data
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:500',
            'tipo' => 'required|string|max:255', // Add tipo validation
        ]);

        // Create a new category
        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'tipo' => $request['tipo'], // Add tipo to the creation
        ]);

        // Redirect to the categories list with a success message
        return redirect()->route('categorias.index')->with('success', 'Categoria created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria')); // Return view with the specific category
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria')); // Return view for editing the category
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        // Validate the request data
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:500',
        ]);

        // Update the category with the new values
        $categoria->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        // Redirect to the categories list with a success message
        return redirect()->route('categorias.index')->with('success', 'Categoria updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        // Delete the category
        $categoria->delete();

        // Redirect to the categories list with a success message
        return redirect()->route('categorias.index')->with('success', 'Categoria deleted successfully');
    }
}
