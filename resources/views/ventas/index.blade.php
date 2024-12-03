<!-- Tabla de citas -->
{{-- resources/views/ventas/index.blade.php --}}
@extends('layouts.template')
@section('content')
<h1>Lista de Productos</h1>
<a href="{{ route('productos.create') }}" class="btn btn-primary">Crear Producto</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Cantidad</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Producto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ventas as $venta)
        <tr>
            <td>{{ $venta->cantidad }}</td>
            <td>{{ $venta->fecha }}</td>
            <td>{{ $venta->total }}</td>
            <td>{{ $venta->producto->nombre }}</td>
            <td>
                <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection