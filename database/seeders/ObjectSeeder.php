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
            'Access Point',
            'Amplificador de sonido',
            'Aspiradora',
            'Audífonos',
            'Bocina',
            'CPU',
            'Cable de video',
            'Cafetera',
            'Cámara fotográfica',
            'Cámara de video',
            'Cargador',
            'CD-ROM',
            'CD-RW',
            'Celular',
            'Disco duro',
            'DVD',
            'Fax',
            'Fotocopiadora',
            'Fuente de poder',
            'Grabadora',
            'Hub de red',
            'Impresora',
            'Impresora de inyección',
            'Impresora de matriz de puntos',
            'Impresora láser',
            'Impresora multifuncional',
            'Juego de bocinas',
            'Lámpara',
            'Laptop',
            'Máquina de escribir',
            'Máquina fotocopiadora',
            'Memoria RAM',
            'Micrófono',
            'Monitor',
            'Mouse',
            'Plotter',
            'Proyector',
            'Radio grabadora',
            'Regulador de voltaje',
            'Escáner a color',
            'Escáner monocromático',
            'Servidor',
            'Tableta digitalizadora',
            'Tablet',
            'Tarjeta de video',
            'Teclado',
            'Teléfono',
            'Televisor',
            'Terminal de computadora',
            'Unidad de cintas',
            'Unidad de respaldo',
            'UPS',
            'Reproductor de video',
            'Videocasetera',
        ];

        foreach ($objects as $object) {
            CgKindObject::create([
                'object' => $object,
            ]);
        }
    }
}
