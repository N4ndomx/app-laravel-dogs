{{-- resources/views/mascotas/index.blade.php --}}
@extends('layouts.template')

@section('content')
<h2>Mascotas</h2>

<!-- Botón para abrir el modal de registrar nueva mascota -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#registroMascotaModal">
    Registrar mascota
</button>

<!-- Modal de registro de mascota -->
<div class="modal fade" id="registroMascotaModal" tabindex="-1" aria-labelledby="registroMascotaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registroMascotaModalLabel">Registrar una mascota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('mascotas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Campos del formulario para registrar una mascota -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la Mascota:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="especie" class="form-label">Especie:</label>
                        <input type="text" class="form-control" id="especie" name="especie" required>
                    </div>
                    <div class="mb-3">
                        <label for="raza" class="form-label">Raza:</label>
                        <input type="text" class="form-control" id="raza" name="raza">
                    </div>
                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad:</label>
                        <input type="number" class="form-control" id="edad" name="edad">
                    </div>
                    <div class="mb-3">
                        <label for="peso" class="form-label">Peso:</label>
                        <input type="number" step="0.1" class="form-control" id="peso" name="peso">
                    </div>
                    <div class="mb-3">
                        <label for="dueno" class="form-label">Dueño:</label>
                        <input type="text" class="form-control" id="dueno" name="dueno" required>
                    </div>
                    <div class="mb-3">
                        <label for="contacto" class="form-label">Contacto:</label>
                        <input type="text" class="form-control" id="contacto" name="contacto" required>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen URL:</label>
                        <input type="text" class="form-control" id="imagen" name="imagen" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Tabla de mascotas -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre de la Mascota</th>
            <th>Especie</th>
            <th>Raza</th>
            <th>Edad</th>
            <th>Peso</th>
            <th>Dueño</th>
            <th>Contacto</th>
            <th>Foto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mascotas as $mascota)
        <tr>
            <td>
                <div class="text-center">{{ $mascota->nombre }} </div>
            </td>
            <td>
                <div class="text-center">{{ $mascota->especie }}</div>
            </td>
            <td>
                <div class="text-center">{{ $mascota->raza }}</div>
            </td>
            <td>
                <div class="text-center">{{ $mascota->edad }}</div>
            </td>
            <td>
                <div class="text-center">{{ $mascota->peso }}</div>
            </td>
            <td>
                <div class="text-center">{{ $mascota->dueno }}</div>
            </td>
            <td>
                <div class="text-center">{{ $mascota->contacto }}</div>
            </td>
            <td>
                <div class="text-center">
                    @if ($mascota->imagen)
                    <img class="rounded-circle" style="width: 95px; height: 90px; object-fit: cover;" src="{{$mascota->imagen }}" width="100">
                    @else
                    <span>No hay imagen</span>
                    @endif
                </div>
            </td>
            <td>
                <div>
                    <button class="btn btn-warning btn-sm" data-mascota="{{ json_encode($mascota) }}"
                        onclick="editar(this)">
                        Editar
                    </button>
                    <form action="{{ route('mascotas.destroy', $mascota->id) }}" method="POST" style="display:inline;" onsubmit="return confirmarEliminacion()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            Eliminar
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    function confirmarEliminacion() {
        return confirm("Eliminar esta esta mascota?");
    }
</script>


<!-- Modal de edición de mascota -->
<div class="modal fade" id="editarMascotaModal" tabindex="-1" aria-labelledby="editarMascotaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarMascotaModalLabel">Editar mascota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editarMascotaForm" action="{{ route('mascotas.update', ['mascota' => 'ID_PLACEHOLDER']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editMascotaId" name="id">
                    <!-- Campos del formulario para editar una mascota -->
                    <div class="mb-3">
                        <label for="editNombre" class="form-label">Nombre de la Mascota:</label>
                        <input type="text" class="form-control" id="editNombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEspecie" class="form-label">Especie:</label>
                        <input type="text" class="form-control" id="editEspecie" name="especie" required>
                    </div>
                    <div class="mb-3">
                        <label for="editRaza" class="form-label">Raza:</label>
                        <input type="text" class="form-control" id="editRaza" name="raza">
                    </div>
                    <div class="mb-3">
                        <label for="editEdad" class="form-label">Edad:</label>
                        <input type="number" class="form-control" id="editEdad" name="edad">
                    </div>
                    <div class="mb-3">
                        <label for="editPeso" class="form-label">Peso:</label>
                        <input type="number" step="0.1" class="form-control" id="editPeso" name="peso">
                    </div>
                    <div class="mb-3">
                        <label for="editDueno" class="form-label">Dueño:</label>
                        <input type="text" class="form-control" id="editDueno" name="dueno" required>
                    </div>
                    <div class="mb-3">
                        <label for="editContacto" class="form-label">Contacto:</label>
                        <input type="text" class="form-control" id="editContacto" name="contacto" required>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen URL:</label>
                        <input type="text" class="form-control" id="imagen" name="imagen" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function editar(button) {
        const mascota = JSON.parse(button.getAttribute('data-mascota'));

        document.getElementById('editMascotaId').value = mascota.id;

        document.getElementById('editNombre').value = mascota.nombre;
        document.getElementById('editEspecie').value = mascota.especie;
        document.getElementById('editRaza').value = mascota.raza;
        document.getElementById('editEdad').value = mascota.edad;
        document.getElementById('editPeso').value = mascota.peso;
        document.getElementById('editDueno').value = mascota.dueno;
        document.getElementById('editContacto').value = mascota.contacto;

        const form = document.getElementById('editarMascotaForm');
        form.action = `/mascotas/${mascota.id}`;

        form.onsubmit = function() {
            return confirm("¿Guardar estos cambios?");
        };

        const editarModal = new bootstrap.Modal(document.getElementById('editarMascotaModal'));
        editarModal.show();
    }
</script>

@endsection