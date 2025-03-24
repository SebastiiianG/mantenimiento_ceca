<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\OrderDeviceRequest;
use \App\Models\CgKindObject;
use \App\Models\OrderDevice;

class OrderDeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return inertia('OrderDevices/Create');
    }

    /**
     * Store a newly created resource in storage.
     * @param App\Http\Requests\OrderDeviceRequest
     * @return \Illuminate\Http\Response
     */

    public function store(OrderDeviceRequest $request)
    {
        $devices = $request->input('devices'); // Obtener los dispositivos enviados

        if (!is_array($devices) || empty($devices)) {
            return response()->json(['error' => 'No se recibieron dispositivos válidos'], 400);
        }

        foreach ($devices as $deviceData) {
            OrderDevice::create($deviceData);
        }

        return response()->json(['message' => 'Todos los dispositivos guardados correctamente']);
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
    public function edit(string $orderId)
    {
        // Buscar dispositivos con el order_id específico
        $devices = OrderDevice::where('order_id', $orderId)->get();

        // Retornar la vista y pasar los dispositivos
        return view('OrderDevices.Edit', compact('devices'));
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
