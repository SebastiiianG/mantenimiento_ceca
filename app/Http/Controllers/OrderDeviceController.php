<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\OrderDeviceRequest;
use \App\Models\CgKindObject;
use \App\Models\OrderDevice;
use \App\Models\Order;
use \App\Models\User;
use \App\Models\CgBrand;
use \App\Models\CgKindFailure;

class OrderDeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Obtenemos el id del usuario autenticado
        $userId = $request->user()->id;
        if ($userId == '1'){
            //Obten todos los dispositivos
            $query = OrderDevice::query();
        } else {
            $query = OrderDevice::where('ceca_repairs', $userId);
        }

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
        ->orderByRaw("FIELD(status, 'Sin asignar', 'En proceso', 'Finalizado')")
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
    }

    /**
     * Store a newly created resource in storage.
     * @param App\Http\Requests\OrderDeviceRequest
     * @return \Illuminate\Http\Response
     */

    public function store(OrderDeviceRequest $request)
    {
        //
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
    public function edit(string $id)
    {
        // Carga el OrderDevice con su relación computer y otras necesarias
        $order_device = OrderDevice::with([
            'cgKindObjects',
            'cgKindFailures',
            'cgBrands',
            'computers'
        ])->findOrFail($id);

        $assign_password = env('ASSIGN_PASSWORD');

        // Si existe la relación y tiene contraseña, agrégala como propiedad adicional
        if ($order_device->computers && $order_device->computers->password) {
            $order_device->password = $order_device->computers->password;
        } else {
            $order_device->password = null;
        }

        $users = User::orderBy('name', 'asc')->get(); // Obtener usuarios ordenados
        $cgKindObjects = CgKindObject::orderBy('object', 'asc')->get();
        $cgBrands = CgBrand::orderBy('brand_name', 'asc')->get();
        $cgKindFailures = CgKindFailure::orderBy('failure', 'asc')->get();

        //dd($order_device);
        return inertia('OrderDevices/EditOne', [
            'order_device' => $order_device,
            'users' => $users, // Obtener usuarios ordenados
            'cgKindObjects' => $cgKindObjects, // Pasar tipo de objetos al formulario
            'cgBrands' => $cgBrands, // Pasar marcas al formulario
            'cgKindFailures' => $cgKindFailures, // Pasar tipo de falla
            'assign_password' => $assign_password,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderDeviceRequest $request, $id)
    {
    $validated = $request->validated();
    $order_device = OrderDevice::findOrFail($id);

    // Primero actualizar con los datos del formulario
    $order_device->update($validated);

    // Corregir el status según ceca_repairs
    if ($order_device->ceca_repairs === null) {
        $order_device->status = 'Sin asignar';
    } elseif ($order_device->ceca_repairs !== null && $order_device->status !== 'Finalizado') {
        $order_device->status = 'En proceso';
    }

    $order_device->save();
    //dd($order_device);

    // Actualizar la orden
    $order = $order_device->order;

    if ($order) {
        $devices = $order->orderDevices;

        if ($devices->contains('status', 'Sin asignar')) {
            $order->status = 'Sin asignar';
        } elseif ($devices->contains('status', 'En proceso')) {
            $order->status = 'En proceso';
        } else {
            $order->status = 'Finalizado';
        }

        $order->save();
    }

    return redirect()->route('dashboard')->with('success', 'Dispositivo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
