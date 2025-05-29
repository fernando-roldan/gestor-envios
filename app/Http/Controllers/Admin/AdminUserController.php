<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CountryState;
use App\Models\LcCountry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->get();
        
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        $roles = Role::all();
        $countries = LcCountry::all()->pluck('name', 'id');

        return view('admin.users.create', compact('user', 'roles', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_name'     => 'required|string|unique:users|max:120',
            'first_name'    => 'required|string',
            'last_name'     => 'string',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|confirmed|min:6',
            'role'          => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'user_name'     => $request->user_name,
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        return redirect()->route('admin.users.index')->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $countries = LcCountry::all()->pluck('name', 'id');

        return view('admin.users.edit', compact('user', 'roles', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'user_name'     => 'required|string|unique:users|max:120',
            'first_name'    => 'required|string',
            'last_name'     => 'string',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|confirmed|min:6',
            'role'          => 'required|exists:roles,name',
        ]);

        $user->update([
            'user_name'     => $request->user_name,
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
        ]);

        if($request->filled('password')) {

            $user->update(['password' => Hash::make($request->password)]);
        }

        $user->syncRoles([$request->role]);

        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        
         return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado');
    }

    public function getStates(Request $request)
    {
        $data['states'] = CountryState::where('lc_country_id', $request->lc_country_id)->get(['name', 'id']);

        return response()->json($data);
    }
}
