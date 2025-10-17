<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario - Hogar Geriátrico</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="https://kit.fontawesome.com/a2e0b5a52a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/inventario.css') }}">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Hogar <span>Geriátrico</span></h2>
        <div class="menu">
            <a href="#"><i class="fas fa-users"></i> Pacientes</a>
            <a href="#"><i class="fas fa-user-nurse"></i> Colaboradores</a>
            <a href="#" class="active"><i class="fas fa-boxes"></i> Inventario</a>
            <a href="#"><i class="fas fa-pills"></i> Medicamentos</a>
            <a href="#"><i class="fas fa-chart-line"></i> Reportes</a>
            <a href="#"><i class="fas fa-cog"></i> Configuración</a>
        </div>
    </div>

    <!-- Main -->
    <div class="main">
        <div class="header">
            <h1>Inventario</h1>
            <div class="user-info">
                <span>{{ Auth::user()->nombre }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"><i class="fas fa-sign-out-alt"></i> Salir</button>
                </form>
            </div>
        </div>

        <div class="dashboard-content">
            <div class="inventory-header">



                <h2>Productos Registrados</h2>
                <div  style="display: flex; gap: 10px; flex-wrap: wrap;">
                     <!-- Formulario de búsqueda -->
                     <form method="GET" action="{{ route('inventario.index') }}" style="display:flex; gap:5px;">
                      <input type="text" name="search" placeholder="Buscar por Nombre, ID o Proveedor" value="{{ request('search') }}"
                       style="padding:0.5rem 1rem; border-radius:10px; border:1px solid #ccc; outline:none;">
                      <button type="submit" class="btn">Buscar</button>
                    </form>
                    <button class="btn">➕Agregar Producto</button>
                    <button class="btn">📝Importar Factura</button>
                    <button class="btn">🏷️Asignar Proveedor</button>
                    <button class="btn">📩Buzon de notificacion</button>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Fecha Caducidad</th>
                        <th>Dosis</th>
                        <th>Indicaciones</th>
                        <th>Lote</th>
                        <th>Presentación</th>
                        <th>Proveedor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>${{ number_format($producto->precio, 2) }}</td>
                        <td>{{ $producto->fecha_caducidad ?? 'N/A' }}</td>
                        <td>{{ $producto->dosis ?? 'N/A' }}</td>
                        <td>{{ $producto->indicaciones ?? 'N/A' }}</td>
                        <td>{{ $producto->lote ?? 'N/A' }}</td>
                        <td>{{ $producto->presentacion ?? 'N/A' }}</td>
                        <td>{{ $producto->proveedor_id ?? 'N/A' }}</td>
                        <td>
                             <button class="btn">Editar</button>
                             <button class="btn">Eliminar</button>
                            
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" style="text-align:center;">No hay productos registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Stock</th>
            <th>Cantidad</th>
         
        </tr>
    </thead>
    <tbody>
        @forelse ($inventarios as $item)
        <tr>
            <td>{{ $item->producto->id }}</td>
            <td>{{ $item->producto->nombre }}</td>
            <td>{{ $item->stock }}</td>
            <td>{{ $item->cantidad }}</td>
          
            
        </tr>
        @empty
        <tr>
            <td colspan="6">No hay productos en inventario.</td>
        </tr>
        @endforelse
    </tbody>
</table>

        </div>
    </div>
</body>
</html>
