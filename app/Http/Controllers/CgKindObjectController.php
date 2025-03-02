<?php

namespace App\Http\Controllers;

use App\Models\CgKindObject;
use Illuminate\Http\Request;
use App\Http\Requests\CgKindObjectRequest;

class CgKindObjectController extends Controller
{
    /**
     * Muestra una lista de los objetos.
     */
    public function index(Request $request)
    {
        $query = CgKindObject::query(); // Se obtiene una consulta base del modelo CgKindObject.

        // Si el usuario ha ingresado un término de búsqueda, se filtran los resultados
        if ($request->filled('search')) {
            $query->where('object', 'LIKE', '%' . $request->search . '%');
        }

        // Se ordenan los objetos por nombre y se paginan los resultados (20 por página).
        $cgKindObjects = $query->orderBy('object', 'asc')->paginate(20)->withQueryString();

        // Se retorna la vista de Inertia con los datos paginados y la búsqueda actual.
        return inertia('CgKindObjects/Index', [
            'cgKindObjects' => $cgKindObjects,
            'search' => $request->search, // Se mantiene el término de búsqueda en el frontend
        ]);
    }

    /**
     * Muestra el formulario para crear un nuevo objeto.
     */
    public function create()
    {
        return inertia('CgKindObjects/Create');
    }

    /**
     * Almacena un nuevo objeto en la base de datos.
     * @param App\Http\Requests\CgKindObjectRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CgKindObjectRequest $request)
    {
        // Se valida la información y se crea un nuevo registro en la base de datos.
        CgKindObject::create($request->validated());

        // Se redirige al listado de objetos.
        return redirect()->route('cgKindObjects.index')->with('success', 'Dispositivo creado con éxito');
    }

    /**
     * Muestra el formulario de edición para un objeto específico.
     * @param CgKindObject $cgKindObject
     */
    public function edit(CgKindObject $cgKindObject)
    {
        return inertia('CgKindObjects/Edit', ['cgKindObject' => $cgKindObject]);
    }

    /**
     * Actualiza la información de un objeto en la base de datos.
     * @param App\Http\Requests\CgKindObjectRequest $request
     * @param CgKindObject $cgKindObject
     * @return \Illuminate\Http\Response
     */
    public function update(CgKindObjectRequest $request, CgKindObject $cgKindObject)
    {
        // Se valida y actualiza el objeto en la base de datos.
        $cgKindObject->update($request->validated());

        // Se redirige al listado de objetos.
        return redirect()->route('cgKindObjects.index')->with('success', 'Dispositivo actualizado con éxito');
    }

    /**
     * Elimina un objeto de la base de datos.
     * @param CgKindObject $cgKindObject
     * @return \Illuminate\Http\Response
     */
    public function destroy(CgKindObject $cgKindObject)
    {
        // Se elimina el objeto de la base de datos.
        $cgKindObject->delete();

        // Se redirige al listado de objetos.
        return redirect()->route('cgKindObjects.index');
    }
}
