<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Verificar se o usuário admin já existe
        $admin = User::where('email', 'admin@devstarterkit.com')->first();
        
        if (!$admin) {
            User::create([
                'name' => 'Administrador',
                'email' => 'admin@devstarterkit.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'is_active' => true,
            ]);
        } else {
            // Atualizar usuário existente com role admin
            $admin->update([
                'role' => 'admin',
                'is_active' => true,
            ]);
        }
    }
}