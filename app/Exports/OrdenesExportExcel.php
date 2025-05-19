<?php

namespace App\Exports;

use App\Models\Order;
use Carbon\Carbon;
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
        $orders = Order::whereIn('status', $this->status)
            ->whereBetween('date_reception', [$this->start_date, $this->end_date])
            ->with([
                'orderDevices.cgBrands',
                'orderDevices.cgKindFailures',
                'orderDevices.cgKindObjects', // si deseas incluir tipo de objeto
                'orderDevices.cecaRepairs',
                'cecaReceived',
                'cecaDelivered'
            ])
            ->get();

        if ($orders->isEmpty()) {
            throw new \Exception("No se encontraron órdenes con los filtros seleccionados.");
        }

        $result = collect();

        foreach ($orders as $order) {
            foreach ($order->orderDevices as $index => $device) {
                $result->push([
                    'order_number'        => $order->order_number,
                    'device_number'       => $order->order_number . ' / ' . ($index + 1),
                    'status'              => $order->status,
                    'date_reception' => $order->date_reception
                        ? Carbon::parse($order->date_reception)->format('d/m/Y')
                        : 'S/F',

                    'delivery_date' => $order->delivery_date
                        ? Carbon::parse($order->delivery_date)->format('d/m/Y')
                        : 'S/F',
                    'ceca_received'       => $order->cecaReceived?->name ?? 'N/A',
                    'ceca_delivered'      => $order->cecaDelivered?->name ?? 'N/A',
                    'device_type'         => $device->cgKindObjects?->object ?? 'N/A',
                    'device_name'         => $device->cgKindFailures?->failure ?? 'N/A',
                    'device_brand'        => $device->cgBrands?->brand_name ?? 'N/A',
                    'device_model'        => $device->model,
                    'device_ceca_repairs' => $device->cecaRepairs?->name ?? 'S/A',
                ]);
            }
        }

        return $result;
    }

    public function headings(): array
    {
        return [
            'Número de Orden', 'Número de dispositivo', 'Estado',
        'Fecha de Recepción', 'Fecha de Entrega', 'Técnico que recibió', 'Técnico que entregó',
        'Tipo de dispositivo', 'Tipo de Falla', 'Marca del Dispositivo', 'Modelo del Dispositivo', 'Técnico que repara'
        ];
    }

}
