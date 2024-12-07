@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold">Gasto Details</h1>
    <div class="mt-4">
        <p><strong>Usuario:</strong> {{ $gasto->usuario->name }}</p>
        <p><strong>Categoria:</strong> {{ $gasto->categoria->nombre }}</p>
        <p><strong>Descripcion:</strong> {{ $gasto->descripcion }}</p>
        <p><strong>Monto:</strong> ${{ number_format($gasto->monto, 2) }}</p>
        <p><strong>Fecha:</strong> {{ $gasto->fecha }}</p>
    </div>
    <a href="{{ route('gastos.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mt-4 inline-block">Back to list</a>
</div>
@endsection
