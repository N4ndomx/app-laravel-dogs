@extends('layouts.template')

@section('content')
<h1>Editar Producto</h1>

<form action="{{ route('productos.update', $producto->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}" required>
    </div>

    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="{{ $producto->precio }}" required>
    </div>

    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" value="{{ $producto->stock }}" required>
    </div>
    <div class="mb-3">
        <label for="categoria" class="form-label">Stock minimo</label>
        <input type="number" class="form-control" id="min_stock" name="min_stock" value="{{ $producto->min_stock }}" required>
    </div>
    <div class="mb-3">
        <label for="categoria" class="form-label">Codigo de Barras</label>
        <input type="text" class="form-control" id="barcode" name="barcode" value="{{ $producto->barcode }}" required>
    </div>
    <div class="mb-3">
        <label for="categoria" class="form-label">Codigo de Barras</label>
        <input type="text" class="form-control" id="imagen" name="imagen" value="{{ $producto->imagen }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar Producto</button>
</form>
@endsection