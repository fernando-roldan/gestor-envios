{{-- @extends('layouts.admin') --}}
@extends('layouts.app')
{{-- @section('title', 'Gestión de Permisos por Rol') --}}
<title>Gestión de Permisos por Rol</title>
@section('content')
    {{-- Formulario de selección de rol (GET) --}}
    <form method="GET" action="{{ route('admin.role-permissions.index') }}">
        <div class="row mb-3">
            <label for="role_id" class="col-sm-2 col-form-label">Seleccionar Rol:</label>
            <div class="col-sm-4">
                <select name="role_id" id="role_id" class="form-select" onchange="this.form.submit()">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ request('role_id', $selectedRole->id ?? null) == $role->id ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    {{-- Verificación del rol seleccionado --}}
    @if($selectedRole)
        {{-- Formulario de actualización de permisos (POST) --}}
        <form method="POST" action="{{ route('admin.role-permissions.update') }}">
            @csrf
            <input type="hidden" name="role_id" value="{{ $selectedRole->id }}">

            @foreach($modules as $module)
                <div class="card mb-3">
                    <div class="card-header">
                        <strong>{{ ucfirst($module->name) }}</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($module->permissions as $perm)
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="permissions[]"
                                            value="{{ $perm->name }}"
                                            id="perm_{{ $perm->id }}"
                                            {{ $selectedRole->hasPermissionTo($perm->name) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="perm_{{ $perm->id }}">
                                            {{ $perm->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

            <button type="submit" class="btn btn-success">Guardar Permisos</button>
        </form>
    @else
        <p class="alert alert-warning">Seleccione un rol para administrar los permisos.</p>
    @endif
@endsection
