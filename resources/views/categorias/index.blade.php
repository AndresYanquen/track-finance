@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold mb-4">Categories</h1>
        <a href="{{ route('categorias.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-3 inline-block">Create New Category</a>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full table-auto border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 border border-gray-300">Name</th>
                    <th class="px-4 py-2 border border-gray-300">Type</th>
                    <th class="px-4 py-2 border border-gray-300">Description</th>
                    <th class="px-4 py-2 border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td class="px-4 py-2 border border-gray-300">{{ $categoria->nombre }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $categoria->tipo ? 'Ingresos' : ($categoria->tipo == 0 ? 'Gastos' : '') }}                        </td>
                        <td class="px-4 py-2 border border-gray-300">{{ $categoria->descripcion }}</td>
                        <td class="px-4 py-2 border border-gray-300">
                            <a href="{{ route('categorias.show', $categoria) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View</a>
                            <a href="{{ route('categorias.edit', $categoria) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
