@extends('layouts.dashboard_admin')

@section('title', 'Listado de Facturas')
@section('header', 'Listado de Facturas')

@section('styles')
@vite(['resources/css/factura/factura_index.css'])
@endsection

@section('content')
<div class="container-factura">
    <div class="card">
        <div class="card-header">
            <h2>Facturas Registradas</h2>
            <a href="{{ route('factura.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Agregar Factura
            </a>
        </div>

        {{-- Mensajes de éxito / error --}}
        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert error">{{ session('error') }}</div>
        @endif

        {{-- Buscador --}}
        <form action="{{ route('factura.index') }}" method="GET" class="form-search">
            <input type="text" name="search" placeholder="Buscar factura..." value="{{ request('search') }}">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>

        {{-- Tabla de facturas --}}
       <table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre Factura</th>
            <th>Fecha</th>
            <th>Precio Total</th>
            <th>Productos</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($facturas as $factura)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $factura->nombre }}</td>
                <td>{{ $factura->fecha }}</td>
                <td>{{ $factura->precio }}</td>
                <td>
                    @foreach($factura->detalleProductos ?? [] as $detalle)
                        {{ $detalle->producto?->nombre ?? 'N/A' }} - {{ $detalle->subtotal }} <br>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('factura.create') }}" class="btn btn-success">Agregar</a>

                    <form action="{{ route('factura.destroy', $factura->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar factura?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

    </div>
</div>
@endsection
