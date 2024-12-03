@extends('layouts.template')

@section('content')
<h1>Crear Producto</h1>

<form action="{{ route('productos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>

    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
    </div>

    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" required>
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stock Minimo</label>
        <input type="number" class="form-control" id="min_stock" name="min_stock" required>
    </div>

    <div class="mb-3">
        <label for="nombre" class="form-label">Codigo de Barras</label>
        <input type="text" class="form-control" id="barcode" name="barcode" required>
    </div>
    <div class="mb-3">
        <label for="nombre" class="form-label">URL IMAGEN</label>
        <input type="text" class="form-control" id="imagen" name="imagen" required>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection