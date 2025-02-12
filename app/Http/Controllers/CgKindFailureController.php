<?php

namespace App\Http\Controllers;

use App\Http\Requests\CgKindFailureRequest;
use Illuminate\Http\Request;
use App\Models\CgKindFailure;
use Inertia\Response;

class CgKindFailureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = CgKindFailure::query();

        // Aplicar búsqueda solo si se proporciona un valor
        if ($request->filled('search')) {
            $query->where('failure', 'LIKE', '%' . $request->search . '%');
        }

        $cgKindFailures = $query->orderBy('failure', 'asc')->paginate(20)->withQueryString();

        return inertia('CgKindFailures/Index', [
            'cgKindFailures' => $cgKindFailures,
            'search' => $request->search // Para que Vue recuerde la búsqueda actual
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('CgKindFailures/Create');
    }

    /**
     * Store a newly created resource in storage.
     * @param App\Http\Requests\CgKindFailureRequest
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CgKindFailureRequest $request)
    {
        //Modelo CgKindFailure
        CgKindFailure::create($request->validated());
        return redirect()->route('cgKindFailures.index');
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
     * @param CgKindFailure $cgKindFailure
     */
    public function edit(CgKindFailure $cgKindFailure)
    {
        return inertia ('CgKindFailures/Edit', ['cgKindFailure' => $cgKindFailure]);
    }

    /**
     * Update the specified resource in storage.
     * @return \App\Http\Requests\CgKindFailureRequest
     * @param CgKindFailure $cgKindFailure
     * @return \Illuminate\Http\Response
     */
    public function update(CgKindFailureRequest $request, CgKindFailure $cgKindFailure)
    {
        $cgKindFailure->update($request->validated());
        return redirect()->route('cgKindFailures.index');
    }

        //


    /**
     *
     *
     * Remove the specified resource from storage.
     *
     * @param CgKindFailure $cgKindFailure
     * @return \Illuminate\Http\Response
     */
    public function destroy(CgKindFailure $cgKindFailure)
    {
        $cgKindFailure->delete();
        return redirect()->route('cgKindFailures.index');
    }
}
