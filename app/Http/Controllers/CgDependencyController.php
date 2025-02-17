<?php

namespace App\Http\Controllers;

use App\Http\Requests\CgBrandRequest;
use App\Http\Requests\CgDependencyRequest;
use App\Models\CgDependency;
use Illuminate\Http\Request;

class CgDependencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = CgDependency::query();

        // Aplicar búsqueda solo si se proporciona un valor
        if ($request->filled('search')) {
            $query->where('dependency_name', 'LIKE', '%' . $request->search . '%');
        }

        $cgDependencies = $query->orderBy('dependency_name', 'asc')->paginate(20)->withQueryString();

        return inertia('CgDependencies/Index', [
            'cgDependencies' => $cgDependencies,
            'search' => $request->search // Para que Vue recuerde la búsqueda actual
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('CgDependencies/Create');
    }

    /**
     * Store a newly created resource in storage.
     * @param App\Http\Requests\CgDependencyRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CgDependencyRequest $request)
    {
        //Model CgDependency
        CgDependency::create($request->validated());
        return redirect()->route('cgDependencies.index');
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
     * @param CgDependency $cgDependency
     */
    public function edit(CgDependency $cgDependency)
    {
        return inertia('CgDependencies/Edit', ['cgDependency' => $cgDependency]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \App\Http\Requests\CgDependencyRequest
     * @param CgDependency $cgDependency
     * @return \Illuminate\Http\Response
     */
    public function update(CgDependencyRequest $request, CgDependency $cgDependency)
    {
        $cgDependency -> update($request->validated());
        return redirect()->route('cgDependencies.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param CgDependency $cgDependency
     * @return \Illuminate\Http\Response
     */
    public function destroy(CgDependency $cgDependency)
    {
        $cgDependency->delete();
        return redirect()->route('cgDependencies.index');
    }
}
