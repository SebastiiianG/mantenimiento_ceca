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
    public function index()
    {
        //
        $users = User::paginate(5);
        return inertia('User/Index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('User/Create');
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
    public function edit(User $users)
    {
        //enviar el objeto usuario para evitar el find id
        return inertia('User/Edit',['users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
