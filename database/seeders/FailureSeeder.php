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
            'Actualizar software básico',
            'Ampliar memoria',
            'Atasco de cassette',
            'Atasco de papel',
            'Batería de BIOS agotada',
            'Botón de encendido dañado',
            'Cable con falso contacto',
            'Cabezales de impresión obstruidos',
            'Carga de tóner',
            'CPU no reconocida',
            'Daño en disco duro',
            'Desgaste de gomas',
            'Disco duro no reconocido',
            'Error en la tarjeta de red',
            'Error en la tarjeta de video',
            'Equipo mojado',
            'Falla en la proyección de color',
            'Falla en unidad CD-RW/DVD',
            'Falla en USB no detectado',
            'Fallo en el respaldo de datos',
            'Formatear equipo',
            'Fuente de poder dañada',
            'Imagen borrosa o distorsionada',
            'Impresión incompleta',
            'Infección por virus',
            'Instalar software',
            'Limpieza y mantenimiento',
            'No arranca el sistema operativo',
            'No despliega imagen',
            'No enciende',
            'No enciende la pantalla',
            'No imprime',
            'No jala las hojas',
            'No proyecta imagen',
            'Problema con desplazamiento',
            'Recarga de tóner',
            'Revisión general',
            'Ruidos extraños en el equipo',
            'Sistema operativo corrupto',
            'Tapa rota',
            'Teflón de impresora dañado',
        ];

        foreach ($failures as $failure) {
            CgKindFailure::create([
                'failure' => $failure,
            ]);
        }
    }
}
