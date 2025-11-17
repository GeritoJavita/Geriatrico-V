@extends('layouts.dashboard')

@section('title', 'Inventarios')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/inventario.css') }}">
@endsection

@section('content')
<div class="inventory-header">
    <h2>Inventario</h2>
    <a href="{{ route('inventario.create') }}" class="btn-add">
        <i class="fas fa-plus"></i> Nuevo Producto
    </a>
</div>

<div class="inventory-filters">
    <div class="search-box">
        <input type="text" placeholder="Buscar producto...">
        <i class="fas fa-search"></i>
    </div>
    <div class="filter-options">
        <select name="categoria">
            <option value="">Todas las categorías</option>
            <option value="medicamentos">Medicamentos</option>
            <option value="insumos">Insumos médicos</option>
            <option value="limpieza">Productos de limpieza</option>
        </select>
        <select name="estado">
            <option value="">Todos los estados</option>
            <option value="disponible">Disponible</option>
            <option value="agotado">Agotado</option>
            <option value="bajo">Stock bajo</option>
        </select>
    </div>
</div>

<div class="inventory-table">
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Estado</th>
                <th>Último movimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->codigo }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->categoria }}</td>
                <td>{{ $producto->stock }}</td>
                <td>
                    <span class="status {{ $producto->estado }}">
                        {{ ucfirst($producto->estado) }}
                    </span>
                </td>
                <td>{{ $producto->ultimo_movimiento }}</td>
                <td class="actions">
                    <a href="{{ route('inventario.edit', $producto->id) }}" class="btn-edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form method="POST" action="{{ route('inventario.destroy', $producto->id) }}" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="pagination">
    {{ $productos->links() }}
</div>
@endsection