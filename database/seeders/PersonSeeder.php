<?php

namespace Database\Seeders;

use App\Models\CgKindPerson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $people = [
            'Alumno',
            'Docente',
            'Administrativo',
            'Visitante',
            'Proveedor',
            'Otro',
        ];

        foreach ($people as $person) {
            CgKindPerson::create([
            'kind_person' => $person,
            ]);
        }
    }
}
