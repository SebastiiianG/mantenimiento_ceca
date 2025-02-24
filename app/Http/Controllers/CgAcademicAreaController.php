<?php

namespace App\Http\Controllers;

use App\Http\Requests\CgAcademicAreaRequest;
use Illuminate\Http\Request;
use App\Models\CgAcademicArea;
use App\Models\CgDependency;
use Inertia\Response;

class CgAcademicAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = CgAcademicArea::with('cgDependency'); // Cargar la relación con CgDependency

        // Aplicar búsqueda solo si se proporciona un valor
        if ($request->filled('search')) {
            $query->where('area_name', 'LIKE', '%' . $request->search . '%')
                  ->orWhereHas('cgDependency', function ($q) use ($request) {
                      $q->where('dependency_name', 'LIKE', '%' . $request->search . '%');
                  });
        }

        $cgAcademicAreas = $query->orderBy('area_name', 'asc')->paginate(20)->withQueryString();

        return inertia('CgAcademicAreas/Index', [
            'cgAcademicAreas' => $cgAcademicAreas,
            'search' => $request->search // Para que Vue recuerde la búsqueda actual
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cgDependencies = CgDependency::orderBy('dependency_name', 'asc')->get(); // Obtener dependencias ordenadas

        return inertia('CgAcademicAreas/Create', [
            'cgDependencies' => $cgDependencies // Pasar dependencias al formulario
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param App\Http\Requests\CgAcademicAreaRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CgAcademicAreaRequest $request)
    {
        CgAcademicArea::create($request->validated());
        return redirect()->route('cgAcademicAreas.index');
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
     * @param CgAcademicArea $cgAcademicArea
     */
    public function edit(CgAcademicArea $cgAcademicArea)
    {
        $cgDependencies = CgDependency::orderBy('dependency_name', 'asc')->get(); // Obtener dependencias

        return inertia('CgAcademicAreas/Edit', [
            'cgAcademicArea' => $cgAcademicArea,
            'cgDependencies' => $cgDependencies // Pasar dependencias al formulario
        ]);
    }


    /**
     * Update the specified resource in storage.
     * @return \App\Http\Requests\CgAcademicAreaRequest
     * @param CgAcademicArea $cgAcademicArea
     * @return \Illuminate\Http\Response
     */
    public function update(CgAcademicAreaRequest $request, CgAcademicArea $cgAcademicArea)
    {
        $cgAcademicArea->update($request->validated());
        return redirect()->route('cgAcademicAreas.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param CgAcademicArea $cgAcademicArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(CgAcademicArea $cgAcademicArea)
    {
        $cgAcademicArea->delete();
        return redirect()->route('cgAcademicAreas.index');
    }
}
