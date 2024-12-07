@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-semibold mb-4">Gestión de Transacciones</h1>
    
    <!-- Filtro por categoría -->
    <div class="mb-4 flex items-center">
        <form action="{{ route('gastos.index') }}" method="GET" class="flex items-center gap-2">
            <select name="categoria_id" 
                    class="border-gray-300 rounded px-4 py-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">Todas las Categorías</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" 
                            {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
            <button type="submit" 
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                Filtrar
            </button>
        </form>
    </div>

    <!-- Botón para crear una nueva transacción -->
    <div class="mb-4">
        <a href="{{ route('gastos.create') }}" 
           class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
            Crear Transacción
        </a>
    </div>

    <!-- Tabla para listar las transacciones -->
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border text-left">Usuario</th>
                <th class="px-4 py-2 border text-left">Categoría</th>
                <th class="px-4 py-2 border text-left">Descripción</th>
                <th class="px-4 py-2 border text-left">Monto</th>
                <th class="px-4 py-2 border text-left">Fecha</th>
                <th class="px-4 py-2 border text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($gastos as $gasto)
                <tr>
                    <td class="px-4 py-2 border">{{ $gasto->usuario->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border">{{ $gasto->categoria->nombre ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border">{{ $gasto->descripcion }}</td>
                    <td class="px-4 py-2 border">{{ number_format($gasto->monto, 2) }}</td>
                    <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($gasto->fecha)->format('d/m/Y') }}</td>
                    <td class="px-4 py-2 border text-center">
                        <!-- Botones de acción -->
                        <a href="{{ route('gastos.edit', $gasto->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600 transition duration-300">Editar</a>
                        <a href="{{ route('gastos.show', $gasto->id) }}" class="bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-600 transition duration-300">Ver</a>
                        <form action="{{ route('gastos.destroy', $gasto->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta transacción?');" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition duration-300">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-2 border text-center">No hay transacciones registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $gastos->links('pagination::tailwind') }}
    </div>

    <!-- Debugging Pagination -->
    <div class="mt-4">
        <p>Page: {{ $gastos->currentPage() }} of {{ $gastos->lastPage() }}</p>
    </div>
</div>
@endsection
