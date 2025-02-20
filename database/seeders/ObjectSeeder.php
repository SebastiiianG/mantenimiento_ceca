<?php

namespace Database\Seeders;

use App\Models\CgKindObject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objects = [
            'Impresora',
            'Proyector',
            'Computadora',
            'Teléfono',
            'Tablet',
            'Laptop',
            'Cámara',
            'Micrófono',
            'Audífonos',
            'Bocina',
            'Monitor',
            'Teclado',
            'Mouse',
            'Smartwatch',
            'Reloj',
            'Router',
            'Switch',
            'Servidor',
            'Disco Duro',
            'Memoria USB',
            'Tarjeta de Video',
            'Tarjeta de Red',
            'Tarjeta Madre',
            'Procesador',
            'Fuente de Poder',
            'Gabinete',
            'Impresora 3D',
            'Escáner',
            'Fax',
            'Teléfono IP',
        ];

        foreach ($objects as $object) {
            CgKindObject::create([
                'object' => $object,
            ]);
        }
    }
}
