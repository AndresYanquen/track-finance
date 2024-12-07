@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-semibold mb-6">Create Gasto</h1>

    <form action="{{ route('gastos.store') }}" method="POST">
        @csrf

        <!-- User Field (Hidden, using logged-in user) -->
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

        <div class="mb-4">
            <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoria</label>
            <select name="categoria_id" id="categoria_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripcion</label>
            <textarea name="descripcion" id="descripcion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
        </div>

        <div class="mb-4">
            <label for="monto" class="block text-sm font-medium text-gray-700">Monto</label>
            <input type="number" name="monto" id="monto" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">Save</button>
    </form>
</div>
@endsection
