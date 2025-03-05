<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            [
                'date_generation' => '2021-09-01',
                'status' => 'Pendiente',
                'client_deliveries' => 'Cliente 1',
                'phone_number' => '1234567890',
                'ext' => '123',
                'cell_number' => '1234567890',
                'kperson_delivery' => 1,
                'cg_dependency_id' => 82,
                'cg_academic_area_id' => 1,
                'ceca_receives' => 1,
                'ceca_deliveries' => 2,
            ],
            [
                'date_generation' => '2021-09-02',
                'delivery_date' => '2021-09-02',
                'status' => 'Pendiente',
                'client_deliveries' => 'Cliente 3',
                'client_receives' => 'Cliente 4',
                'phone_number' => '1234567890',
                'ext' => '123',
                'cell_number' => '1234567890',
                'kperson_delivery' => 2,
                'cg_dependency_id' => 82,
                'cg_academic_area_id' => 2,
                'ceca_receives' => 1,
                'ceca_deliveries' => 2,
            ],
            [
                'date_generation' => '2021-09-03',
                'delivery_date' => '2021-09-03',
                'status' => 'Pendiente',
                'client_deliveries' => 'Cliente 5',
                'client_receives' => 'Cliente 6',
                'phone_number' => '1234567890',
                'ext' => '123',
                'cell_number' => '1234567890',
                'kperson_delivery' => 3,
                'cg_dependency_id' => 82,
                'cg_academic_area_id' => 3,
                'ceca_receives' => 1,
                'ceca_deliveries' => 2,
            ],
        ];

        foreach ($orders as $order){
            Order::create($order);
        }

    }
}
