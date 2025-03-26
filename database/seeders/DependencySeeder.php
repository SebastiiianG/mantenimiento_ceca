<?php

namespace Database\Seeders;

use App\Models\CgDependency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DependencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dependencies = [
            'Administración de Ciudad del Conocimiento', //1
            'Administración de Edificio Central', //2
            'Administración de Torres de Rectoría', //3
            'Centro de Educación Continua y a Distancia', //4
            'Centro de Innovación para el Desarrollo y la Capacitación en Materiales Educativos', //5
            'Centro de Lenguas', //6
            'Contraloría General', //7
            'Coordinación de Administración y Finanzas', //8
            'Defensor Universitario', //9
            'Dirección de Administración de Personal', //10
            'Dirección de Administración Escolar', //11
            'Dirección de Ahorro para el Retiro', //12
            'Dirección de Archivo General', //13
            'Dirección de Autoaprendizaje de Idiomas', //14
            'Dirección de Becas', //15
            'Dirección de Bibliotecas y Centros de Información', //16
            'Dirección de Bioterio', //17
            'Dirección de Centro de Cómputo Académico', //18
            'Dirección de Comunicación Social', //19
            'Dirección de Control Presupuestal', //20
            'Dirección de Desarrollo de Capital Humano para la Investigación', //21
            'Dirección de Desarrollo e Innovación', //22
            'Dirección de Ediciones y Publicaciones', //23
            'Dirección de Educación Media Superior', //24
            'Dirección de Educación Superior', //25
            'Dirección de Enlace Institucional', //26
            'Dirección de Estudios de Pertinencia, Factibilidad y Viabilidad', //27
            'Dirección de Estudios Estratégicos y Desarrollo Institucional', //28
            'Dirección de Eventos Especiales', //29
            'Dirección de Fomento a la Lectura', //30
            'Dirección de Gestión de la Calidad', //31
            'Dirección de Imagen y Mercadotecnia', //32
            'Dirección de Información y Sistemas', //33
            'Dirección de Internacionalización', //34
            'Dirección de Investigación', //35
            'Dirección de la Divulgación de la Ciencia', //36
            'Dirección de Laboratorios', //37
            'Dirección de Mantenimiento', //38
            'Dirección de Promoción Cultural', //39
            'Dirección de Promoción Deportiva', //40
            'Dirección de Protección Civil', //41
            'Dirección de Proyectos y Obras', //42
            'Dirección de Recursos Financieros', //43
            'Dirección de Recursos Materiales, Adquisiciones, Arrendamientos y Servicios', //44
            'Dirección de Relaciones Interinstitucionales', //45
            'Dirección de Relaciones Internacionales e Intercambio Académico', //46
            'Dirección de Relaciones Públicas', //47
            'Dirección de Servicio Social, Prácticas Profesionales y Vinculación Laboral', //48
            'Dirección de Servicios Académicos', //49
            'Dirección de Superación Académica', //50
            'Dirección de Tecnologías Web y Webometría', //51
            'Dirección de Tesorería', //52
            'Dirección de Transferencia de Tecnología', //53
            'Dirección de Tutorías', //54
            'Dirección de Vinculación con Egresados', //55
            'Dirección General de Comunicación Social', //56
            'Dirección General de Evaluación', //57
            'Dirección General de Planeación', //58
            'Dirección General Jurídica', //59
            'División Académica', //60
            'División de Extensión de la Cultura', //61
            'División de Investigación, Desarrollo e Innovación', //62
            'División de Vinculación e Internacionalización', //63
            'Escuela Preparatoria Número 1', //64
            'Escuela Preparatoria Número 2', //65
            'Escuela Preparatoria Número 3', //66
            'Escuela Preparatoria Número 4', //67
            'Escuela Preparatoria Número 5', //68
            'Escuela Preparatoria Número 6', //69
            'Escuela Preparatoria Número 7', //70
            'Escuela Preparatoria Número 8', //71
            'Escuela Superior de Actopan', //72
            'Escuela Superior de Apan', //73
            'Escuela Superior de Atotonilco de Tula', //74
            'Escuela Superior de Ciudad Sahagún', //75
            'Escuela Superior de Huejutla', //76
            'Escuela Superior de Tepeji del Río', //77
            'Escuela Superior de Tizayuca', //78
            'Escuela Superior de Tlahuelilpan', //79
            'Escuela Superior de Zimapán', //80
            'Externo', //81
            'Instituto de Artes (IA)', //82
            'Instituto de Ciencias Agropecuarias (ICAp)', //83
            'Instituto de Ciencias Básicas e Ingeniería (ICBI)', //84
            'Instituto de Ciencias de la Salud (ICSa)', //85
            'Instituto de Ciencias Económico Administrativas (ICEA)', //86
            'Instituto de Ciencias Sociales y Humanidades (ICSHu)', //87
            'Museo Casa Grande', //88
            'Parque Científico y Tecnológico', //89
            'Patronato', //90
            'Radio Universidad Actopan', //91
            'Radio Universidad Huejutla', //92
            'Radio Universidad Pachuca', //93
            'Radio Universidad San Bartolo Tutotepec', //94
            'Radio Universidad Tulancingo', //95
            'Radio Universidad Zimapán', //96
            'Rectoría', //97
            'Secretaría General', //98
            'Sindicato de Personal Académico UAEH (SPAUAEH)', //99
            'Sindicato Único de Trabajadores y Empleados de la Universidad Autónoma del Estado de Hidalgo (SUTEUAEH)', //100
            'Sistema Universitario de Medios Autónomos', //101
            'Transparencia y Acceso a la Información', //102
            'Voluntariado Universitario', //103
        ];



        foreach ($dependencies as $dependency) {
            CgDependency::create([
                'dependency_name' => $dependency,
            ]);
        }
    }
}
