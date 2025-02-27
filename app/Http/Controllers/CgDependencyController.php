<?php

namespace App\Http\Controllers;

use App\Models\CgDependency;
use Illuminate\Http\Request;
use App\Http\Requests\CgDependencyRequest;

class CgDependencyController extends Controller
{
    /**
     * Muestra una lista de los objetos.
     */
    public function index(Request $request)
    {
        $query = CgDependency::query(); // Se obtiene una consulta base del modelo CgDependency.

        // Si el usuario ha ingresado un término de búsqueda, se filtran los resultados
        if ($request->filled('search')) {
            $query->where('dependency_name', 'LIKE', '%' . $request->search . '%');
        }

        // Se ordenan los objetos por nombre y se paginan los resultados (20 por página).
        $cgDependencies = $query->orderBy('dependency_name', 'asc')->paginate(20)->withQueryString();

        // Se retorna la vista de Inertia con los datos paginados y la búsqueda actual.
        return inertia('CgDependencies/Index', [
            'cgDependencies' => $cgDependencies,
            'search' => $request->search, // Se mantiene el término de búsqueda en el frontend
        ]);
    }

    /**
     * Muestra el formulario para crear un nuevo objeto.
     */
    public function create()
    {
        return inertia('CgDependencies/Create');
    }

    /**
     * Almacena un nuevo objeto en la base de datos.
     * @param App\Http\Requests\CgDependencyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CgDependencyRequest $request)
    {
        // Se valida la información y se crea un nuevo registro en la base de datos.
        CgDependency::create($request->validated());

        // Se redirige al listado de objetos.
        return redirect()->route('cgDependencies.index');
    }

    /**
     * Muestra el formulario de edición para un objeto específico.
     * @param CgDependency $cgDependency
     */
    public function edit(CgDependency $cgDependency)
    {
        return inertia('CgDependencies/Edit', ['cgDependency' => $cgDependency]);
    }

    /**
     * Actualiza la información de un objeto en la base de datos.
     * @param App\Http\Requests\CgDependencyRequest $request
     * @param CgDependency $cgDependency
     * @return \Illuminate\Http\Response
     */
    public function update(CgDependencyRequest $request, CgDependency $cgDependency)
    {
        // Se valida y actualiza el objeto en la base de datos.
        $cgDependency->update($request->validated());

        // Se redirige al listado de objetos.
        return redirect()->route('cgDependencies.index');
    }

    /**
     * Elimina un objeto de la base de datos.
     * @param CgDependency $cgDependency
     * @return \Illuminate\Http\Response
     */
    public function destroy(CgDependency $cgDependency)
    {
        // Se elimina el objeto de la base de datos.
        $cgDependency->delete();

        // Se redirige al listado de objetos.
        return redirect()->route('cgDependencies.index');
    }
}
