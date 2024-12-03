{{-- resources/views/productos/index.blade.php --}}
@extends('layouts.template')
@section('content')
<h1>Lista de Productos</h1>
<a href="{{ route('productos.create') }}" class="btn btn-primary">Crear Producto</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Minimo Stock</th>
            <th>Codigo de Barras</th>
            <th>Foto</th>

            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->precio }}</td>
            <td>{{ $producto->stock }}</td>
            <td>{{ $producto->min_stock }}</td>
            <td>{{ $producto->barcode }}</td>
            <td>
                <div class="text-center">
                    @if ($producto->imagen)
                    <img class="rounded-circle" style="width: 95px; height: 90px; object-fit: cover;" src="{{$producto->imagen }}" width="100">
                    @else
                    <span>No hay imagen</span>
                    @endif
                </div>
            </td>
            <td>
                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
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