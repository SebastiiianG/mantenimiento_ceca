<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Inertia\Inertia;
use App\Http\Requests\UserRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::query();
        //Aplicar búsqueda solo si se proporciona un valor
        if ($request->filled('search')){
            $query->where('name', 'LIKE', '%' . $request->search . '%')
            ->orWhere('user_number', 'LIKE', '%' . $request->search . '%');

        }

        $users = $query->orderBy('name','asc')->paginate(10)->withQueryString();

        return inertia('Users/Index',[
            'users' => $users,
            'search' => $request->search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Users/Create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(UserRequest $request)
    {
        //guardar los valores validados del formulario
        $user = User::create($request->validated());

        //asignar el rol al usuario
        $user->assignRole($request->role);

        //mandar msj de confirmacion
        console.log('Usuario creado');

        return redirect()->route('users.index');
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
        $role = $user->getRoleNames(); // Obtiene los roles asignados al usuario (devuelve una colección)
        // Obtiene todos los roles disponibles en la BD
        return inertia('Users/Edit',['users' => $user , 'role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        //Actualizar usuario con los datos validados
        $user->update ($request->validated());
        //asignar el rol al usuario
        $user->syncRoles($request->role);

        //crear una sesion flash
        //session()->flash('success','Usuario actualizado exitosamente');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
