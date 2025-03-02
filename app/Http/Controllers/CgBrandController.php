<?php

namespace App\Http\Controllers;

use App\Http\Requests\CgBrandRequest;
use Illuminate\Http\Request;
use App\Models\CgBrand;
use Inertia\Response;

class CgBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = CgBrand::query();

        // Aplicar búsqueda solo si se proporciona un valor
        if ($request->filled('search')) {
            $query->where('brand_name', 'LIKE', '%' . $request->search . '%');
        }

        $cgBrands = $query->orderBy('brand_name', 'asc')->paginate(20)->withQueryString();

        return inertia('CgBrands/Index', [
            'cgBrands' => $cgBrands,
            'search' => $request->search // Para que Vue recuerde la búsqueda actual
        ]);
    }

    /*protected function applySearch($query, $search){
        return $query->when($search, function($query, $search){
            $query->where('brand_name', 'LIKE', '%'.$search.'%');
            $query->orderBy('brand_name', 'asc');
        });
    }*/

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('CgBrands/Create');
    }

    /**
     * Store a newly created resource in storage.
     * @param App\Http\Requests\CgBrandRequest
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CgBrandRequest $request)
    {
        //Modelo CgBrand
        CgBrand::create($request->validated());
        return redirect()->route('cgBrands.index')->with('success', 'Marca creada con éxito');
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
     * @param CgBrand $cgBrand
     */
    public function edit(CgBrand $cgBrand)
    {
        return inertia ('CgBrands/Edit', ['cgBrand' => $cgBrand]);
    }

    /**
     * Update the specified resource in storage.
     * @return \App\Http\Requests\CgBrandRequest
     * @param CgBrand $cgBrand
     * @return \Illuminate\Http\Response
     */
    public function update(CgBrandRequest $request, CgBrand $cgBrand)
    {
        $cgBrand->update($request->validated());
        return redirect()->route('cgBrands.index')->with('success', 'Marca actualizada con éxito');
    }

        //


    /**
     *
     *
     * Remove the specified resource from storage.
     *
     * @param CgBrand $cgBrand
     * @return \Illuminate\Http\Response
     */
    public function destroy(CgBrand $cgBrand)
    {
        $cgBrand->delete();
        return redirect()->route('cgBrands.index');
    }
}
