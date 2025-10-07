<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Verifica se o admin já existe para não duplicar
        if (Admin::where('email', 'admin@example.com')->doesntExist()) {
            Admin::create([
                'nome' => 'Administrador',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123'), // Defina uma senha segura aqui
            ]);
        }
    }
}