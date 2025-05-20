<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents; // Importación de clase para evitar eventos al ejecutar seeder
use Illuminate\Database\Seeder; // Clase base de seeder
use Illuminate\Support\Facades\Hash; // Importación de Hash para encriptar contraseñas
use App\Models\User; // Importación del modelo User

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Este método se ejecuta al correr el seeder para insertar datos en la base de datos.
     */
    public function run(): void
    {
        // Creación del usuario "admin"
        // Creación del usuario "admin"
        $superuser = User::create([
            'name' => 'Superusuario Administración CECA', // Nombre del usuario
            'email' => 'editar@uaeh.edu.mx', // Email del usuario
            'password'=> Hash::make('superusuario'), // Contraseña encriptada
            'user_number' => 1111, // Número de usuario único
            'status' => true // Estado del usuario
        ]);
        $superuser->assignRole('superuser'); // Asignación del rol "admin" al usuario creado


        $admin = User::create([
            'name' => 'María Guadalupe Badillo Domínguez', // Nombre del usuario
            'email' => 'badillom@uaeh.edu.mx', // Email del usuario
            'password'=> Hash::make('admin'), // Contraseña encriptada
            'user_number' => 5373, // Número de usuario único
            'status' => true // Estado del usuario
        ]);
        $admin->assignRole('admin'); // Asignación del rol "admin" al usuario creado

        // Creación del usuario "editor"
        $editor = User::create([
            'name' => 'Omar González Luna', // Nombre del usuario
            'email' => 'omargluna@hotmail.com', // Email del usuario
            'password'=> Hash::make('editor'), // Contraseña encriptada
            'user_number' => 8219, // Número de usuario único
            'status' => true // Estado del usuario
        ]);
        $editor->assignRole('editor'); // Asignación del rol "editor" al usuario creado

        // Creación del usuario "editor"
        $editor = User::create([
            'name' => 'Gabriela Alejandra Cabrera Martínez', // Nombre del usuario
            'email' => 'gaby__am@hotmail.com', // Email del usuario
            'password'=> Hash::make('editor'), // Contraseña encriptada
            'user_number' => 3848, // Número de usuario único
            'status' => true // Estado del usuario
        ]);
        $editor->assignRole('editor'); // Asignación del rol "editor" al usuario creado

        $editor = User::create([
            'name' => 'Davy Roberto Garrido Olivera', // Nombre del usuario
            'email' => 'davy@uaeh.edu.mx', // Email del usuario
            'password'=> Hash::make('editor'), // Contraseña encriptada
            'user_number' => 8021, // Número de usuario único
            'status' => true // Estado del usuario
        ]);
        $editor->assignRole('editor'); // Asignación del rol "editor" al usuario creado
    }
}
