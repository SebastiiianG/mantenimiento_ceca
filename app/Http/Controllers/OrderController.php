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

        $orders = $query->orderBy('id', 'asc')->paginate(20)->withQueryString();

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
     return DB::transaction(function () use ($request) {


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
         $orderDevices = $order->orderDevices()->createMany($devicesData);

         // Iterar sobre cada dispositivo creado para guardar la computadora, si aplica
         foreach ($orderDevices as $key => $orderDevice) {
             // Revisar si el dispositivo es de tipo computer (por ejemplo, si el campo 'computer' es 1)
             // y además se proporcionó una contraseña en los datos enviados para ese dispositivo.
             if ($orderDevice->computer == 1 && !empty($devicesData[$key]['password'])) {
                 // Crea el registro en la tabla 'computers' asociado a este dispositivo.
                 // Puedes encriptar la contraseña, por ejemplo, usando bcrypt.
                 $orderDevice->computers()->create([
                     'password' => $devicesData[$key]['password'],
                 ]);
             }
         }

         // Cargar la relación de dispositivos (puedes usar 'orderDevices' o, si definiste alias, 'devices')
         //return response()->json($order->load('orderDevices'), 201);
         //Redireccionamos con mensaje de éxito
         return redirect()->route('orders.index')->with('success', 'Orden de mantenimiento creada con éxito');
     });
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

        // Buscar dispositivos con el order_id específico
        $devices = OrderDevice::where('order_id', $order)->get();

        return inertia('Orders/Edit', [
            'order' => $order,
            'cgDependencies' => $cgDependencies,// Pasar dependencias al formulario
            'cgAcademicAreas' => $cgAcademicAreas, // Obtener áreas académicas ordenadas
            'cgKindPeople' => $cgKindPeople, // Pasar tipo de personas al formulario
            'users' => $users, // Obtener usuarios ordenados
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
        $validatedData = $request->validated();

        // Si el área académica es 'none', convertirlo a null
        if ($validatedData['cg_academic_area_id'] === 'none') {
            $validatedData['cg_academic_area_id'] = null;
        }

        // Actualizar la orden con los datos validados
        $order->update($validatedData);

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


    public function report(Order $order){

    }
}
