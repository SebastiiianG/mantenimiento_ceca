<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
        //guardar los valores del formulario
        User::create($request->validated());
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
    { /* user */
        return inertia('Users/Edit',['users' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update ($request->validated());
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
