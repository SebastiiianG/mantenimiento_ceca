<?php

namespace App\Http\Controllers;

use App\Models\CgKindPerson;
use App\Http\Requests\CgKindPersonRequest;
use Illuminate\Http\Request;

class CgKindPersonController extends Controller
{
     /**
     * Muestra una lista de los objetos.
     */
    public function index(Request $request)
    {
        $query = CgKindPerson::query(); // Se obtiene una consulta base del modelo CgKindPerson.

        // Si el usuario ha ingresado un término de búsqueda, se filtran los resultados
        if ($request->filled('search')) {
            $query->where('kind_person', 'LIKE', '%' . $request->search . '%');
        }

        // Se ordenan los objetos por nombre y se paginan los resultados (20 por página).
        $cgKindPeople = $query->orderBy('kind_person', 'asc')->paginate(20)->withQueryString();

        // Se retorna la vista de Inertia con los datos paginados y la búsqueda actual.
        return inertia('CgKindPeople/Index', [
            'cgKindPeople' => $cgKindPeople,
            'search' => $request->search, // Se mantiene el término de búsqueda en el frontend
        ]);
    }

    /**
     * Muestra el formulario para crear un nuevo objeto.
     */
    public function create()
    {
        return inertia('CgKindPeople/Create');
    }

    /**
     * Almacena un nuevo objeto en la base de datos.
     * @param App\Http\Requests\CgKindPersonRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CgKindPersonRequest $request)
    {
        // Se valida la información y se crea un nuevo registro en la base de datos.
        CgKindPerson::create($request->validated());

        // Se redirige al listado de objetos.
        return redirect()->route('cgKindPeople.index');
    }

    /**
     * Muestra el formulario de edición para un objeto específico.
     * @param CgKindPerson $cgKindPerson
     */
    public function edit(CgKindPerson $cgKindPerson)
    {
        return inertia('CgKindPeople/Edit', ['cgKindPerson' => $cgKindPerson]);
    }

    /**
     * Actualiza la información de un objeto en la base de datos.
     * @param App\Http\Requests\CgKindPersonRequest $request
     * @param CgKindPerson $cgKindPerson
     * @return \Illuminate\Http\Response
     */
    public function update(CgKindPersonRequest $request, CgKindPerson $cgKindPerson)
    {
        // Se valida y actualiza el objeto en la base de datos.
        $cgKindPerson->update($request->validated());

        // Se redirige al listado de objetos.
        return redirect()->route('cgKindPeople.index');
    }

    /**
     * Elimina un objeto de la base de datos.
     * @param CgKindPerson $cgKindPerson
     * @return \Illuminate\Http\Response
     */
    public function destroy(CgKindPerson $cgKindPerson)
    {
        // Se elimina el objeto de la base de datos.
        $cgKindPerson->delete();

        // Se redirige al listado de objetos.
        return redirect()->route('cgKindPeople.index');
    }
}
