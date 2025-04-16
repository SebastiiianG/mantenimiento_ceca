<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\OrderDeviceRequest;
use \App\Models\CgKindObject;
use \App\Models\OrderDevice;
use \App\Models\Order;

class OrderDeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Obtenemos el id del usuario autenticado
        //$userId = $request->user()->id;
        //$query = OrderDevice::where('ceca_repairs', $userId);
        $query = OrderDevice::query();
        //obtener la contraseña de los dispositivos

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('model',  'LIKE', '%' . $search . '%')
                ->orWhere('status', 'LIKE', '%' . $search . '%')
                ->orWhere('order_id', 'LIKE', '%' . $search . '%')
                ->orWhereHas('cgKindObjects', function ($q2) use ($search) {
                    $q2->where('object', 'LIKE', '%' . $search . '%');
                })
                ->orWhereHas('cecaRepairs', function ($q3) use ($search) {
                    $q3->where('name', 'LIKE', '%' . $search . '%');
                });
            });
        }

        $order_devices = $query->with('cgKindObjects', 'cgKindFailures', 'cgBrands', 'cecaRepairs')
            ->orderBy('status', 'desc')
            ->paginate(20)
            ->withQueryString();

        return inertia('Dashboard', [
            'order_devices' => $order_devices,
            'search'        => $request->search,
        ]);
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

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    // Carga el OrderDevice con su relación computer y otras necesarias
    $order_device = OrderDevice::with([
        'cgKindObjects',
        'cgKindFailures',
        'cgBrands',
        'cecaRepairs',
        'computers'
    ])->findOrFail($id);

    // Si existe la relación y tiene contraseña, agrégala como propiedad adicional
    if ($order_device->computers && $order_device->computers->password) {
        $order_device->password = $order_device->computers->password;
    } else {
        $order_device->password = null;
    }

    return inertia('OrderDevices/Show', [
        'order_device' => $order_device,
    ]);
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $orderId)
    {
        //
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
