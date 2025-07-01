@extends('layouts.simple.master')

<title>GMV Usuarios</title>

@section('main_content')
    <h3>Usuarios</h3>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Nuevo Usuario</a>
    
    <div id="tableExample3" data-list='{"valueNames":["userName", "name","email", "role"], "page":10, "pagination":true}'>
        <div class="search-box mb-3 mx-auto">
            <form class="position-relative">
                <input class="form-control search-input search form-control-sm" type="search" placeholder="Search" aria-label="Search" />
                <span class="fas fa-search search-box-icon"></span>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm fs-9 mb-0">
                <thead>
                    <tr>
                        <th class="sort border-top border-translucent ps-3" data-sort="userName">User Name</th>
                        <th lass="sort border-top" data-sort="name">Nombre</th>
                        <th lass="sort border-top" data-sort="email">Email</th>
                        <th lass="sort border-top" data-sort="role">Rol</th>
                        <th class="sort text-end align-middle pe-0 border-top" scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($users as $user)
                        <tr>
                            <td class="align-middle ps-3 name">{{ $user->user_name }}</td>
                            <td class="align-middle name">{{ $user->first_name }}</td>
                            <td class="align-middle email">{{ $user->email }}</td>
                            <td class="align-middle name">{{ $user->roles->pluck('name')->join(', ') }}</td>
                            <td class="align-middle white-space-nowrap text-end pe-0">
                                <div class="btn-reveal-trigger position-static">
                                    <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                        <span class="fas fa-ellipsis-h fs-10"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end py-2">
                                        <a class="dropdown-item" href="{{ route('admin.users.edit', $user) }}">Editar</a>
                                        <div class="dropdown-divider"></div>
                                        @role('super-admin')
                                            <a class="dropdown-item text-danger" href="{{ route('admin.users.destroy', $user) }}"
                                                onclick="event.preventDefault();
                                                    document.getElementById('deleteUser').submit();">Eliminar</a>

                                            <form id="deleteUser" class="d-none" action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar usuario?')">Eliminar</button>
                                            </form>
                                        @endrole
                                    </div>                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between mt-3">
            <span class="d-none d-sm-inline-block" data-list-info="data-list-info"></span>
            <div class="d-flex">
                <button class="page-link" data-list-pagination="prev">
                    <span class="fas fa-chevron-left"></span>
                </button>
                <ul class="mb-0 pagination"></ul>
                <button class="page-link pe-0" data-list-pagination="next">
                    <span class="fas fa-chevron-right"></span>
                </button>
            </div>
        </div>
    </div>
@endsection