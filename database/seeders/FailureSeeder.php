<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CgKindFailure;

class FailureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $failures = [
            'No enciende',
            'No carga',
            'No se conecta a la red',
            'No se conecta a internet',
            'No se conecta a la VPN',
            'No se conecta a la impresora',
            'No se conecta al proyector',
            'No se conecta al teléfono',
        ];

        foreach ($failures as $failure) {
            CgKindFailure::create([
                'failure' => $failure,
            ]);
        }
    }
}
