@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold mb-4">Category Details</h1>

        <div class="bg-white shadow rounded-lg p-6 mb-4">
            <h3 class="text-xl font-semibold">{{ $categoria->nombre }}</h3>
            <p class="mt-2"><strong>Description:</strong> {{ $categoria->descripcion }}</p>
        </div>

        <a href="{{ route('categorias.index') }}" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">Back to Categories</a>
    </div>
@endsection
