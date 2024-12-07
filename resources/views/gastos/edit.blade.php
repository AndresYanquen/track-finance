@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold">Edit Gasto</h1>
    <form action="{{ route('gastos.update', $gasto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="user_id" class="block text-sm font-medium text-gray-700">Usuario</label>
            <select name="user_id" id="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $usuario->id == $gasto->user_id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoria</label>
            <select name="categoria_id" id="categoria_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $categoria->id == $gasto->categoria_id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripcion</label>
            <textarea name="descripcion" id="descripcion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old
