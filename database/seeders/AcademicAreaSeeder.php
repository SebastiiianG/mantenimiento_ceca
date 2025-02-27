<?php

namespace Database\Seeders;

use App\Models\CgAcademicArea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $academicAreas = [
            ['area_name' => 'Área Académica de Ingeniería Agroindustrial e Ingeniería en Alimentos', 'cg_dependency_id' => 82],
            ['area_name' => 'Área Académica de Medicina Veterinaria y Zootecnia', 'cg_dependency_id' => 82],
            ['area_name' => 'Área Académica de Ciencias Agrícolas y Forestales', 'cg_dependency_id' => 82],
            ['area_name' => 'Área Académica de Derecho y Jurisprudencia', 'cg_dependency_id' => 86],
            ['area_name' => 'Área Académica de Ingeniería Agroindustrial e Ingeniería en Alimentos', 'cg_dependency_id' => 82],
            ['area_name' => 'Área Académica de Medicina Veterinaria y Zootecnia', 'cg_dependency_id' => 82],
            ['area_name' => 'Área Académica de Ciencias Agrícolas y Forestales', 'cg_dependency_id' => 82],
            ['area_name' => 'Área Académica de Derecho y Jurisprudencia', 'cg_dependency_id' => 86],
            ['area_name' => 'Área Académica de Ciencias Políticas y Administración Pública (AA de CP y AP)', 'cg_dependency_id' => 86],
            ['area_name' => 'Área Académica de Ciencias de la Comunicación', 'cg_dependency_id' => 86],
            ['area_name' => 'Área Academia de Trabajo Social', 'cg_dependency_id' => 86],
            ['area_name' => 'Área Académica de Ciencias de la Educación', 'cg_dependency_id' => 86],
            ['area_name' => 'Área Académica de Historia y Antropología (AAHA)', 'cg_dependency_id' => 86],
            ['area_name' => 'Área Académica de Sociología y Demografía', 'cg_dependency_id' => 86],
            ['area_name' => 'Área Académica de Lingüística', 'cg_dependency_id' => 86],
            ['area_name' => 'Área Académica de Medicina', 'cg_dependency_id' => 84],
            ['area_name' => 'Área Académica de Enfermería', 'cg_dependency_id' => 84],
            ['area_name' => 'Área Académica de Odontología', 'cg_dependency_id' => 84],
            ['area_name' => 'Área Académica de Farmacia', 'cg_dependency_id' => 84],
            ['area_name' => 'Área Académica de Nutricón', 'cg_dependency_id' => 84],
            ['area_name' => 'Área Académica de Psicología', 'cg_dependency_id' => 84],
            ['area_name' => 'Área Académica de Psicología', 'cg_dependency_id' => 84],
            ['area_name' => 'Área Académica de Contaduría', 'cg_dependency_id' => 85],
            ['area_name' => 'Área Académica de Administración', 'cg_dependency_id' => 85],
            ['area_name' => 'Área Académica de Economía', 'cg_dependency_id' => 85],
            ['area_name' => 'Área Académica de Comercio Exterior', 'cg_dependency_id' => 85],
            ['area_name' => 'Área Académica de Turismo', 'cg_dependency_id' => 85],
            ['area_name' => 'Área Académica de Mercadotecnia', 'cg_dependency_id' => 85],
            ['area_name' => 'Área Académica de Biología (AAB)', 'cg_dependency_id' => 83],
            ['area_name' => 'Área Académica de Ciencias de la Tierra y Materiales (AACTyM)', 'cg_dependency_id' => 83],
            ['area_name' => 'Área Académica de Computación y Electrónica (AACyE)', 'cg_dependency_id' => 83],
            ['area_name' => 'Área Académica de Ingeniería y Arquitectura (AAIyA)', 'cg_dependency_id' => 83],
            ['area_name' => 'Área Académica de Matemáticas y Física (AAMyF)', 'cg_dependency_id' => 83],
            ['area_name' => 'Área Académica de Química (AAQ)', 'cg_dependency_id' => 83],
        ];

        foreach ($academicAreas as $area) {
            CgAcademicArea::create($area);
        }
    }
}
