<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\OrderRequest;
use \App\Models\Order;
use \App\Models\CgAcademicArea;
use \App\Models\CgDependency;
use \App\Models\CgKindPerson;
use \App\Models\User;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Funciones del modelo order
        $query = Order::with(['cgDependency']);
        // Aplicar búsqueda solo si se proporciona un valor
        if ($request->filled('search')) {
            $query->where('order_number', 'LIKE', '%' . $request->search . '%')
                ->orWhere('status', 'LIKE', '%' . $request->search . '%')
                ->orWhere('date_reception', 'LIKE', '%' . $request->search . '%')
                ->orWhere('client_deliveries', 'LIKE', '%' . $request->search . '%')
                ->orWhereHas('cgDependency', function ($q) use ($request) {
                      $q->where('dependency_name', 'LIKE', '%' . $request->search . '%');
                  });
        }

        $orders = $query->orderBy('order_number', 'asc')->paginate(20)->withQueryString();

        return inertia('Orders/Index', [
            'orders' => $orders,
            'search' => $request->search // Para que Vue recuerde la búsqueda actual
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cgDependencies = CgDependency::orderBy('dependency_name', 'asc')->get(); // Obtener dependencias
        $cgAcademicAreas = CgAcademicArea::orderBy('area_name', 'asc')->get(); // Obtener áreas académicas ordenadas
        $users = User::orderBy('name', 'asc')->get(); // Obtener usuarios ordenados
        $cgKindPeople = CgKindPerson::orderBy('kind_person', 'asc')->get();


        return inertia('Orders/Create', [
            'cgDependencies' => $cgDependencies,// Pasar dependencias al formulario
            'cgAcademicAreas' => $cgAcademicAreas, // Obtener áreas académicas ordenadas
            'cgKindPeople' => $cgKindPeople, // Pasar tipo de personas al formulario
            'users' => $users // Obtener usuarios ordenados
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param App\Http\Requests\OrderRequest
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        Order::create($request->validated());
        return redirect()->route('orders.index')->with('success', 'Orden creada con éxito');
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
     * @param Order $order
     */
    public function edit(Order $order)
    {
        $cgDependencies = CgDependency::orderBy('dependency_name', 'asc')->get(); // Obtener dependencias
        $cgAcademicAreas = CgAcademicArea::orderBy('area_name', 'asc')->get(); // Obtener áreas académicas ordenadas
        $users = User::orderBy('name', 'asc')->get(); // Obtener usuarios ordenados
        $cgKindPeople = CgKindPerson::orderBy('kind_person', 'asc')->get();


        return inertia('Orders/Edit', [
            'order' => $order,
            'cgDependencies' => $cgDependencies,// Pasar dependencias al formulario
            'cgAcademicAreas' => $cgAcademicAreas, // Obtener áreas académicas ordenadas
            'cgKindPeople' => $cgKindPeople, // Pasar tipo de personas al formulario
            'users' => $users // Obtener usuarios ordenados
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @return \App\Http\Requests\OrderRequest
     * @param Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $order)
    {
        $order->update($request->validated());
        return redirect()->route('orders.index')->with('success', 'Orden actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }
}
