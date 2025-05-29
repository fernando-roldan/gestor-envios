<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $roles = Role::all();
        $modules = Module::with('permissions')->get();

        $selectedRole = $request->query('role_id') ? $roles->where('id', $request->query('role_id'))->first() : $roles->first();
        
        return view('admin.role-permissions.index', compact('roles', 'modules', 'selectedRole'));
    }

    public function create()
    {
        $roles = Role::all();
        
        return view('admin.roles-permissions.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:roles']);
        Role::create(['name' => $request->name]);

        return redirect()->route('admin.role-permissions.index')->with('success', 'Rol creado correctamente');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $role = Role::findOrFail($request->role_id);
        $role->syncPermissions($request->permissions ?? []);

        return redirect()->route('dashboard_default')->with('success', 'Permisos actualizados correctamente');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.role-permissions.index')->with('alert', 'Rol Eliminado correctamente');
    }
}
