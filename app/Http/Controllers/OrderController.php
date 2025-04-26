<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\OrderRequest;
use \App\Models\Order;
use \App\Models\CgAcademicArea;
use \App\Models\CgDependency;
use \App\Models\CgKindPerson;
use \App\Models\User;
use \App\Models\CgKindObject;
use \App\Models\CgBrand;
use \App\Models\CgKindFailure;
use \App\Models\OrderDevice;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;




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
                ->orWhere('client_delivered', 'LIKE', '%' . $request->search . '%')
                ->orWhereHas('cgDependency', function ($q) use ($request) {
                    $q->where('dependency_name', 'LIKE', '%' . $request->search . '%');
                  });
        }

        $orders = $query->orderByRaw("FIELD(status, 'Sin asignar', 'En proceso', 'Finalizado')")
        ->paginate(20)
        ->withQueryString();

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
        // Recuperamos el último order_number generado
        $lastOrderNumber = Order::orderByDesc('id')->value('order_number');

        if (!$lastOrderNumber) {
            $lastOrderNumber = 'AM-0'; // O cualquier valor inicial que desees
        }
        // Generar el nuevo número de orden
        $newOrderNumber = $this->generateOrderNumber($lastOrderNumber);

        //Las cuatro líneas de abajo verifican que se esté pasando correctamente la variable
        // Registrar en el log el último número de orden y el nuevo número de orden generado
        /*Log::info('Números de orden:', [
            'last_order_number' => $lastOrderNumber,
            'new_order_number' => $newOrderNumber
        ]);
        dd($newOrderNumber);*/
        // Obtener todas las órdenes para mostrarlas en el combo

        $cgDependencies = CgDependency::orderBy('dependency_name', 'asc')->get(); // Obtener dependencias
        $cgAcademicAreas = CgAcademicArea::select('id', 'area_name', 'cg_dependency_id')->orderBy('area_name', 'asc')->get();
        $users = User::orderBy('name', 'asc')->get(); // Obtener usuarios ordenados
        $cgKindPeople = CgKindPerson::orderBy('kind_person', 'asc')->get();
        //objetos para el formulario por dispositivos
        $cgKindObjects = CgKindObject::orderBy('object', 'asc')->get();
        $cgBrands = CgBrand::orderBy('brand_name', 'asc')->get();
        $cgKindFailures = CgKindFailure::orderBy('failure', 'asc')->get();

        return inertia('Orders/Create', [
            'newOrderNumber' => $newOrderNumber,
            'cgDependencies' => $cgDependencies,// Pasar dependencias al formulario
            'cgAcademicAreas' => $cgAcademicAreas, // Obtener áreas académicas ordenadas
            'cgKindPeople' => $cgKindPeople, // Pasar tipo de personas al formulario
            'users' => $users, // Obtener usuarios ordenados
            'cgKindObjects' => $cgKindObjects, // Pasar tipo de objetos al formulario
            'cgBrands' => $cgBrands, // Pasar marcas al formulario
            'cgKindFailures' => $cgKindFailures, // Pasar tipo de fall
        ]);
    }

    private function generateOrderNumber($lastOrderNumber) {
        // Extraemos la parte numérica después del guion
        preg_match('/-(\d+)$/', $lastOrderNumber, $matches);

        if ($matches) {
            // Si hay un número, incrementamos
            $lastId = intval($matches[1]);
            return 'AM-' . ($lastId + 1); // Concatenamos el prefijo y el número incrementado
        } else {
            // Si no hay número (es el primer número de orden)
            return 'AM-1';
        }
    }
    /**
     * Store a newly created resource in storage.
     * @param App\Http\Requests\OrderRequest
     * @return \Illuminate\Http\Response
     */

    public function store(OrderRequest $request)
    {
     //Log::info('Datos recibidos:', $request->all());
     // Creamos la orden con la fecha incluida
        try {
            DB::transaction(function () use ($request) {
                // Extraer los datos de la orden, excepto 'devices'
                $orderData = $request->except('devices');

                // Si el valor de cg_academic_area_id es 'none', cambiarlo a null
                if ($orderData['cg_academic_area_id'] === 'none') {
                    $orderData['cg_academic_area_id'] = null;
                }
                $orderData['date_generation'] = now()->format('Y-m-d');

                // Crear la orden
                $order = Order::create($orderData);

                // Crear los dispositivos asociados y obtener la colección creada
                $devicesData = $request->devices;
                /* Si esta vacio el array de devices */
                /* Log::info('Datos recibidos:', $devicesData);
                if (empty($devicesData)) {
                    throw new \Exception('No se han proporcionado dispositivos para la orden');
                }
 */
                $orderDevices = $order->orderDevices()->createMany($devicesData);

                // Iterar sobre cada dispositivo creado para guardar la computadora, si aplica
                foreach ($orderDevices as $key => $orderDevice) {
                    // Revisar si tiene contraseña
                    if ($orderDevice->computer == 1 && empty($devicesData[$key]['password'])) {
                        throw new \Exception('Proporcione la contraseña para el dispositivo '.$key+1);
                    }
                    elseif ($orderDevice->computer == 1 && !empty($devicesData[$key]['password'])) {
                         // Crea el registro en la tabla 'computers' asociado a este dispositivo.
                        $orderDevice->computers()->create([
                            'password' => $devicesData[$key]['password'],
                        ]);
                    }
                }
            });
        } catch (\Exception $e) {
            // Si hay un error, se mostrará el mensaje de error
            return redirect()->back()->with('error', $e->getMessage());
        }
        // Si todo sale bien, se redirige a la página de inicio
        return redirect()->route('orders.index')->with('success', 'Orden de mantenimiento creada con éxito');
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
        //dd($order);
        $cgDependencies = CgDependency::orderBy('dependency_name', 'asc')->get(); // Obtener dependencias
        $cgAcademicAreas = CgAcademicArea::orderBy('area_name', 'asc')->get(); // Obtener áreas académicas ordenadas
        $users = User::orderBy('name', 'asc')->get(); // Obtener usuarios ordenados
        $cgKindPeople = CgKindPerson::orderBy('kind_person', 'asc')->get();
        //objetos para el formulario por dispositivos
        $cgKindObjects = CgKindObject::orderBy('object', 'asc')->get();
        $cgBrands = CgBrand::orderBy('brand_name', 'asc')->get();
        $cgKindFailures = CgKindFailure::orderBy('failure', 'asc')->get();

        // Buscar dispositivos con el order_id específico
        //$devices = OrderDevice::where('order_id', $order)->get();

        //$devices = Order::with('orderDevices:$order')->get();

        //obtener el id del array order
        $id = $order->id;
        // Obtener la orden con sus dispositivos relacionados
        $devices = Order::with('orderDevices')->findOrFail($id);
        //dd($devices);
        //Encontrar la contraseña del dispositivo
        foreach ($devices->orderDevices as $device) {
            if ( $device->computers()->exists() && $device->computers->password != null) {
                $device->password = $device->computers->password;
            }
        }

        // Recuperamos el último order_number generado
        $lastOrderNumber = Order::orderByDesc('id')->value('order_number');

        if (!$lastOrderNumber) {
            $lastOrderNumber = 'AM-0'; // O cualquier valor inicial que desees
        }
        // Generar el nuevo número de orden
        $newOrderNumber = $this->generateOrderNumber($lastOrderNumber);

        return inertia('Orders/Edit', [
            'order' => $order,
            'newOrderNumber' => $newOrderNumber,
            'cgDependencies' => $cgDependencies,// Pasar dependencias al formulario
            'cgAcademicAreas' => $cgAcademicAreas, // Obtener áreas académicas ordenadas
            'cgKindPeople' => $cgKindPeople, // Pasar tipo de personas al formulario
            'users' => $users, // Obtener usuarios ordenados
            'cgKindObjects' => $cgKindObjects, // Pasar tipo de objetos al formulario
            'cgBrands' => $cgBrands, // Pasar marcas al formulario
            'cgKindFailures' => $cgKindFailures, // Pasar tipo de falla
            'devices' => $devices, // Obtener dispositivos con el order_id específico
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
        try {
            DB::transaction(function () use ($request, $order) {
                $validatedData = $request->except('devices');

                // Si el área académica es 'none', convertirlo a null
                if ($validatedData['cg_academic_area_id'] === 'none') {
                    $validatedData['cg_academic_area_id'] = null;
                }

                $deletedIds = $request->input('deleted_device_ids', []);
                if (!empty($deletedIds)) {
                    foreach ($deletedIds as $deviceId) {
                        $device = OrderDevice::find($deviceId);
                        if ($device) {
                            if ($device->computer) {
                                $device->computers()->delete();
                            }
                            $device->delete();
                        }
                    }
                }

                // Actualizar la orden con los datos validados
                $order->update($validatedData);

                // Obtener los dispositivos enviados en la solicitud
                $devicesData = $request->devices;

                // Iterar sobre los dispositivos recibidos y actualizarlos
                foreach ($devicesData as $deviceData) {
                    $orderDevice = $order->orderDevices()->find($deviceData['id']);

                    if ($orderDevice) {
                        $orderDevice->update($deviceData);

                        // Si el dispositivo es una computadora y tiene contraseña, actualizar o crear el registro en 'computers'
                        if ($orderDevice->computer == 1 && !empty($deviceData['password'])) {
                            $orderDevice->computers()->updateOrCreate(
                                ['order_device_id' => $orderDevice->id], // Condición para actualizar
                                ['password' => $deviceData['password']] // Datos a actualizar o crear
                            );
                        }
                    }
                }
            });
        } catch (\Exception $e) {
            // Si hay algún error, redireccionar con mensaje de error
            return redirect()->back()->with('error', $e->getMessage());

        }
        // Si todo sale bien, redireccionar a la página de detalles de la orden
        return redirect()->route('orders.index')->with('success', 'Orden de mantenimiento actualizada con éxito');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        try {
            DB::transaction(function () use ($order) {
                // Obtener los dispositivos asociados a la orden
                $devices = $order->orderDevices;

                foreach ($devices as $device) {
                    // Si tiene una computadora relacionada, eliminarla
                    if ($device->computer) {
                        $device->computers()->delete();
                    }

                    // Eliminar el dispositivo
                    $device->delete();
                }

                //Eliminar la orden
                $order->delete();
            });
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('orders.index')->with('success', 'La orden ha sido eliminada con éxito');
    }

    public function report(Order $order){

        //dd(config('dompdf.options.enable_php'));
        // Obtener el contenido del archivo JSON de notas
        $notesData = Storage::disk('local')->exists('report_notes.json')
            ? Storage::disk('local')->get('report_notes.json')
            : json_encode(['notes' => '']);
        $notes = json_decode($notesData, true)['notes'] ?? '';

       // Cargar la orden con las relaciones (eager loading)
        $loadedOrder = Order::with([
            'orderDevices.cgKindObjects',
            'orderDevices.cgBrands',
            'orderDevices.cgKindFailures'
        ])->find($order->id);

        // Habilitar recursos remotos para cargar CSS de Bootstrap desde el CDN
        $pdf = Pdf::setOptions(['isRemoteEnabled' => true])
            ->loadView('orders.report', [
                'order'   => $loadedOrder,
                'devices' => $loadedOrder->orderDevices,
                'notes'   => $notes,
            ]);

        return $pdf->stream('orden_mantenimiento_' . $loadedOrder->order_number . '.pdf');


    }
}
