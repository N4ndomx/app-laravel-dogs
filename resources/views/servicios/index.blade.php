{{-- resources/views/servicios/index.blade.php --}}
@extends('layouts.template')

@section('content')
<h2>Servicios</h2>

<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#registroServicioModal">
    Registrar servicio
</button>

<div class="modal fade" id="registroServicioModal" tabindex="-1" aria-labelledby="registroServicioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registroServicioModalLabel">Registrar un servicio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('servicios.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Servicio:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio:</label>
                        <input type="number" step="0.01" class="form-control" id="precio" name="precio">
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre del Servicio</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <!-- Obtención dee la información -->
        @foreach ($servicios as $servicio)
        <tr>
            <td>{{$servicio->nombre}}</td>
            <td>{{$servicio->descripcion}}</td>
            <td>${{ number_format($servicio->precio, 2) }}</td>
            <td>
                <div>
                    <button class="btn btn-warning btn-sm" data-servicio="{{ json_encode($servicio) }}"
                        onclick="editar(this)">
                        Editar
                    </button>
                    <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST" style="display:inline;" onsubmit="return confirmarEliminacion()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"></i>Eliminar</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    function confirmarEliminacion() {
        return confirm("Eliminar este servicio?");
    }
</script>

<div class="modal fade" id="editarServicioModal" tabindex="-1" aria-labelledby="editarServicioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarServicioModalLabel">Editar servicio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editarServicioForm" method="POST">

                    @csrf
                    @method('PUT')

                    <input type="hidden" id="editServicioId" name="id">

                    <div class="mb-3">
                        <label for="editNombre" class="form-label">Nombre del Servicio:</label>
                        <input type="text" class="form-control" id="editNombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="editDescripcion" class="form-label">Descripción:</label>
                        <textarea class="form-control" id="editDescripcion" name="descripcion"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editPrecio" class="form-label">Precio:</label>
                        <input type="number" step="0.01" class="form-control" id="editPrecio" name="precio">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function editar(button) {
        const servicio = JSON.parse(button.getAttribute('data-servicio'));

        document.getElementById('editServicioId').value = servicio.id;
        document.getElementById('editNombre').value = servicio.nombre;
        document.getElementById('editDescripcion').value = servicio.descripcion;
        document.getElementById('editPrecio').value = servicio.precio;

        const form = document.getElementById('editarServicioForm');
        form.action = `/servicios/${servicio.id}`;

        form.onsubmit = function() {
            return confirm("Guardar estos cambios?");
        };

        const editarModal = new bootstrap.Modal(document.getElementById('editarServicioModal'));
        editarModal.show();
    }
</script>


@endsection