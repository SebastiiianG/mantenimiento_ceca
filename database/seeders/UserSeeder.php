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
        $admin = User::create([
            'name' => 'admin', // Nombre del usuario
            'email' => 'fareynoso207@gmail.com', // Email del usuario
            'password'=> Hash::make('admin'), // Contraseña encriptada
            'user_number' => 464396, // Número de usuario único
            'status' => true // Estado del usuario
        ]);
        $admin->assignRole('admin'); // Asignación del rol "admin" al usuario creado

        // Creación del usuario "editor"
        $editor = User::create([
            'name' => 'editor', // Nombre del usuario
            'email' => 'ulsegaga03@gmail.com', // Email del usuario
            'password'=> Hash::make('editor'), // Contraseña encriptada
            'user_number' => 401420, // Número de usuario único
            'status' => true // Estado del usuario
        ]);
        $editor->assignRole('editor'); // Asignación del rol "editor" al usuario creado
    }
}
