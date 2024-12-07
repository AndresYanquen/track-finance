@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold mb-4">Create Category</h1>

        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Category Name</label>
                <input type="text" name="nombre" id="nnombreame" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('nombre') }}" required>
                @error('nombre')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="descripcion" id="descripcion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <!-- Add tipo input field in the form -->
            <div class="mb-4">
                <label for="tipo" class="block text-sm font-medium text-gray-700">Category Type</label>
                <input type="text" name="tipo" id="tipo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('tipo') }}" required>
                @error('tipo')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">Create</button>
        </form>
    </div>
@endsection
