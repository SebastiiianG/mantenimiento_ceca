<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class OrdenesExportExcel implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $status;
    private $start_date;
    private $end_date;

    public function __construct($status, $start_date, $end_date)
    {
        $this->status = is_array($status) ? $status : [$status];
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function collection()
{
    \Log::info('Filtros recibidos', [
        'status' => $this->status,
        'start_date' => $this->start_date,
        'end_date' => $this->end_date,
    ]);

    $orders = Order::whereIn('status', $this->status)
        ->whereBetween('date_reception', [$this->start_date, $this->end_date])
        ->with('orderDevices.cgBrands',
                'orderDevices.cgKindFailures',
                'orderDevices.cecaRepairs',
                )
        ->get();

    if ($orders->isEmpty()) {
        throw new \Exception("No se encontraron órdenes con los filtros seleccionados.");
    }

    $result = $orders->flatMap(function ($order) {
        // Por cada dispositivo en la orden, devuelve una fila por dispositivo
        return $order->orderDevices->map(function ($device) use ($order) {
            return [
                'order_number'     => $order->order_number,
                'status'           => $order->status,
                'date_reception'   => $order->date_reception,
                'delivery_date'    => $order->delivery_date,
                'ceca_received'    => $order->cecaReceived ? $order->cecaReceived->name : 'N/A',
                'ceca_delivered'   => $order->cecaDelivered ? $order->cecaDelivered->name : 'N/A',
                'device_id'        => $device->id,
                'device_name'      => $device->cgKindFailures ? $device->cgKindFailures->failure : 'N/A',
                'device_brand'     => $device-> cgBrands ? $device->cgBrands->brand_name : 'N/A',
                'device_model'     => $device->model,
                'device_ceca_repairs' => $device->cecaRepairs ? $device->cecaRepairs->name : 'N/A',

            ];
        });
    });

    return collect($result);
}

    public function headings(): array
    {
        return [
            'Numero de Orden', 'Estado',
            'Fecha de Recepción', 'Fecha de Entrega', 'Técnico que recibió', 'Técnico que entregó',
            'ID del Dispositivo', 'Nombre del Dispositivo', 'Marca del Dispositivo', 'Modelo del Dispositivo', 'Tecnico que repara'
        ];
    }

}
