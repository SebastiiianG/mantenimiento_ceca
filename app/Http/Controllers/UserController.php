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
        // Aplicar búsqueda solo si se proporciona un valor
        if ($request->filled('search')) {
            $search = strtolower($request->search); // Convertimos la búsqueda a minúsculas para evitar problemas de mayúsculas/minúsculas.

            $query->where(function ($q) use ($search) {
                // Filtra los usuarios cuyo nombre o número de empleado coincidan con la búsqueda
                $q->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('user_number', 'LIKE', '%' . $search . '%');

                // Si el usuario busca "Activo", filtramos solo los usuarios con status = 1
                if ($search === 'activo') {
                    $q->orWhere('status', 1);
                }
                // Si el usuario busca "Inactivo", filtramos solo los usuarios con status = 0
                elseif ($search === 'inactivo') {
                    $q->orWhere('status', 0);
                }
            });
        }


        $users = $query->orderBy('status', 'desc') // Primero los usuarios activos (1), luego los inactivos (0)
               ->orderBy('name', 'asc') // Luego ordena por nombre
               ->paginate(10)
               ->withQueryString();

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

        //crear sesion flash
        //session()->flash('success', 'Usuario creado con éxito');

        return redirect()->route('users.index')->with('success', 'Usuario creado con éxito');
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

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->user_number == 5373) {
            return redirect()->route('users.index')->with('error', 'No se puede eliminar al administrador principal.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
